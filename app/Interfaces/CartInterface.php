<?php

namespace App\Interfaces;

use App\Models\Product;

interface CartInterface
{
    /**
     * @return mixed
     */
    public function get(): mixed;

    /**
     * @return int
     */
    public function getTotal(): int;

    /**
     * @return void
     */
    public function clear(): void;

    /**
     * @param Product $product
     * @return void
     */
    public function add(Product $product): void;

    /**
     * @param Product $product
     * @return bool
     */
    public function remove(Product $product): bool;

    /**
     * @param Product $product
     * @return void
     */
    public function update(Product $product): void;

}
