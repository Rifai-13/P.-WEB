<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{

    public $status;
    public $message;
    public $resource;


    /**
     @param mixed $status
     @param mixed $message
     @param mixed $resource
     @return void
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

     public function __construct($status, $message, $resource)
     {
         parent::__construct($resource);
         $this->status = $status;
         $this->message = $message;
        
     }
    public function toArray(Request $request): array
    {
        return [
            'success' => $this->status,
            'message' => $this->message,
            'data' => $this->resource
        ];
    }
}
