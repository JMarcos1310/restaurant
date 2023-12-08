<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|

Route::get('/menu/cart', function () {
    // Lógica para obtener los elementos del carrito (puedes personalizar según tus necesidades)
    $userID = 1; // Ajusta el ID del usuario según tus necesidades
    $cartItems = \DB::table('cart')
        ->join('dishes', 'cart.DishID', '=', 'dishes.ID')
        ->where('cart.UserID', '=', $userID)
        ->select('dishes.Name as name', 'dishes.Price as price', 'cart.Quantity as quantity')
        ->get();

    // Calcular el total
    $total = 0;
    foreach ($cartItems as $item) {
        $total += $item->price * $item->quantity;
    }

    // Renderizar la vista del carrito y pasar los elementos del carrito y el total
    return view('menu.cart', ['cartItems' => $cartItems, 'total' => $total]);
})->name('menu.showCart');

// Ruta para mostrar el carrito
Route::get('/menu/cart', function () {
    // Lógica para obtener los elementos del carrito (puedes personalizar según tus necesidades)
    $userID = 1; // Ajusta el ID del usuario según tus necesidades
    $cartItems = \DB::table('cart')
        ->join('dishes', 'cart.DishID', '=', 'dishes.ID')
        ->where('cart.UserID', '=', $userID)
        ->select('dishes.Name as name', 'dishes.Price as price', 'cart.Quantity as quantity')
        ->get();

    // Calcular el total
    $total = 0;
    foreach ($cartItems as $item) {
        $total += $item->price * $item->quantity;
    }

    // Renderizar la vista del carrito y pasar los elementos del carrito y el total
    return view('menu.cart', ['cartItems' => $cartItems, 'total' => $total]);
})->name('menu.showCart');


// Ruta para agregar al carrito
Route::post('/menu/add-to-cart/{id}', function ($id) {
    // Lógica para agregar el plato al carrito (puedes personalizar según tus necesidades)
    $userID = 1; // Ajusta el ID del usuario según tus necesidades

    // Verifica si el plato ya está en el carrito del usuario
    $existingCartItem = \DB::table('cart')
        ->where('UserID', $userID)
        ->where('DishID', $id)
        ->first();

    if ($existingCartItem) {
        // Si el plato ya está en el carrito, incrementa la cantidad
        \DB::table('cart')
            ->where('UserID', $userID)
            ->where('DishID', $id)
            ->increment('Quantity');
    } else {
        // Si el plato no está en el carrito, agrégalo con cantidad 1
        \DB::table('cart')->insert([
            'UserID' => $userID,
            'DishID' => $id,
            'Quantity' => 1,
        ]);
    }

    // Redirige de vuelta al menú con un mensaje de éxito
    return redirect()->route('menu.showMenu')->with('success', 'Plato agregado al carrito exitosamente.');
})->name('menu.addToCart');


*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reservaciones', function () {
    return view('reservaciones');
});


// Ruta para mostrar la lista de almacenes (warehouses)
Route::get('/warehouses', function () {
    $warehouses = DB::table('warehouses')->get();
    return view('warehouses.index', ['warehouses' => $warehouses]);
});

// Ruta para mostrar las estanterías (shelves) de un almacén específico
Route::get('/warehouses/{warehouseID}/shelves', function ($warehouseID) {
    $shelves = DB::table('shelves')->where('WarehouseID', $warehouseID)->get();
    return view('shelves.index', ['shelves' => $shelves]);
});

// Ruta para mostrar los ingredientes de una estantería específica
Route::get('/shelves/{shelfID}/ingredients', function ($shelfID) {
    $ingredients = DB::table('ingredients')->where('ShelfID', $shelfID)->get();
    return view('ingredients.index', ['ingredients' => $ingredients]);
});

// Ruta para mostrar el menú
Route::get('/menu', function () {
    // Obtener la lista de platillos desde la base de datos
    $dishes = \DB::table('dishes')->get();
    
    // Renderizar la vista del menú y pasar la lista de platillos
    return view('menu.index', ['dishes' => $dishes]);
})->name('menu.showMenu');



// Ruta para procesar el pago con tarjeta (simulado con un formulario POST)
Route::match(['get', 'post'], '/menu/procesar-pago-con-tarjeta', function () {
    // Lógica para procesar el pago con tarjeta (puedes personalizar según tus necesidades)

    if (request()->isMethod('post')) {
        // Simulación de procesamiento de pago exitoso
        $paymentDetails = [
            'payment_status' => 'success',
            'payment_id' => uniqid(),
            'amount' => 65.99, // Monto del pago con tarjeta
            'dish_name' => request('nombre'), // Nombre del platillo
            'card_type' => 'Visa', // Puedes personalizar según tus necesidades
            // Otros detalles del pago
        ];

        // Redirige a la página de generación de ticket después del pago
        return redirect()->route('menu.generateTicket')->with('paymentDetails', $paymentDetails);
    }

    // Si la solicitud es GET, puedes agregar lógica adicional si es necesario
    // ...

    return 'This is a GET request for payment processing';
})->name('menu.processCardPayment');


// Ruta para generar el ticket
Route::get('/menu/generate-ticket', function () {
    // Recuperar los detalles del pago de la sesión
    $paymentDetails = session('paymentDetails');

    // Verificar si hay detalles de pago disponibles
    if (!$paymentDetails) {
        // Si no hay detalles de pago, redirige a la página de menú con un mensaje de error
        return redirect()->route('menu.showMenu')->with('error', 'No se encontraron detalles de pago.');
    }

    // Lógica para generar el ticket en formato PDF (puedes personalizar según tus necesidades)
    $pdfContent = "Detalles del Ticket:\n\n";
    $pdfContent .= "Número de Pedido: {$paymentDetails['payment_id']}\n";
    $pdfContent .= "Estado del Pago: {$paymentDetails['payment_status']}\n";
    $pdfContent .= "Monto: {$paymentDetails['amount']}\n";
    // Agrega más detalles según sea necesario

    // Renderizar la vista de generación de ticket y pasar el contenido del PDF y los detalles del pago
    return view('menu.generate-ticket', ['pdfContent' => $pdfContent, 'paymentDetails' => $paymentDetails]);
})->name('menu.generateTicket');
