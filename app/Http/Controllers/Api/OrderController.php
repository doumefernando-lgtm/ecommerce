<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //  Créer une commande (panier → commande)
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1'
        ]);

        $user = $request->user();

        return DB::transaction(function () use ($request, $user) {

            $order = Order::create([
                'user_id' => $user->id,
                'total' => 0,
                'status' => 'pending'
            ]);

            $total = 0;

            foreach ($request->items as $item) {

                $product = Product::find($item['product_id']);

                //  Vérification stock
                if ($product->stock < $item['quantity']) {
                    abort(400, "Stock insuffisant pour {$product->name}");
                }

                // ➖ Diminuer stock
                $product->decrement('stock', $item['quantity']);

                //  Prix ligne
                $linePrice = $product->price * $item['quantity'];
                $total += $linePrice;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price
                ]);
            }

            // 🔁 Mise à jour total
            $order->update(['total' => $total]);

            return response()->json($order->load('items'), 201);
        });
    }

    //  Historique commandes utilisateur
    public function myOrders(Request $request)
    {
        return response()->json(
            $request->user()->orders()->with('items.product')->get()
        );
    }
}
