<?php

namespace App\src;
use App\Product;

class XmlProcessor
{
    protected $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function processXML()
    {
        try {
            $formatedContent = json_decode(json_encode(simplexml_load_string($this->content)), true);
            foreach ($formatedContent['new_products']['product'] as $product) {
                if ($existingProduct = Product::where('code', $product['code'])->first()) {
                    $this->updateProduct($existingProduct, $product);
                } else {
                    $this->newProduct($product);
                }
            }
        } catch (\Exception $e) {
            return response()->json(XmlUploader::returnError('Content formating error'));
        }

        return response()->json(['result' => 'ok']);
    }

    private function updateProduct(Product $product, $data)
    {
        $product->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price']
        ]);
    }

    private function newProduct($data)
    {
        Product::create([
            'code' => $data['code'],
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price']
        ]);
    }

}