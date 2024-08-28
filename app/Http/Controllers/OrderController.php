<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    public function __construct(public OrderRepository $orderRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        Gate::authorize('viewAny', Order::class);

        $orders = $this->orderRepository->all();

        return response()->json(['data' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request): JsonResponse
    {
        Gate::authorize('create', Order::class);
        $order = $this->orderRepository->store($request->validated());
        return response()->json(['message' => "Order created successfully", "data" => $order]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): JsonResponse
    {
        Gate::authorize('view', $order);
        $order = $this->orderRepository->find($order->id);
        return response()->json(['data' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order): JsonResponse
    {
        Gate::authorize('update', $order);
        $this->orderRepository->update($order->id, $request->validated());
        $order = $this->orderRepository->find($order->id);
        return response()->json(['message' => "Order updated successfully", "data" => $order]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): JsonResponse
    {
        Gate::authorize('delete', $order);
        $this->orderRepository->delete($order->id);
        return response()->json(['message' => "Order deleted successfully"]);

    }
}
