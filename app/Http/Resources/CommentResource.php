<?php

namespace App\Http\Resources;

use App\Models\AdminInformation;
use App\Models\CustomerInformation;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $bool = true;
        $user = User::findOrFail($this->user_id);
        if($user->role_id == 1 ){
            $user_info = AdminInformation::where('user_id',$this->user_id)->first();
            $admin = new AdminInformationResource($user_info);
        }else{
            $user_info = CustomerInformation::where('user_id',$this->user_id)->first();
            $customer = new CustomerInformationResource($user_info);
            $bool = false;
        }
        return [
            'comment_id' => $this->id,
            'comment' => $this->value,
            'user_info' => $bool?$admin:$customer
        ];
    }
}
