<?php

namespace App;

use Bavix\Wallet\Interfaces\Customer;
use Bavix\Wallet\Interfaces\Product;
use Bavix\Wallet\Traits\HasWallet;
use Illuminate\Database\Eloquent\Model;

class Task extends Model implements Product
{

    use HasWallet;
    
    public function canBuy(Customer $customer,int $quantity=1,bool $force=null):bool{
        return true;
    }
    public function getAmountProduct(): int 
    {
return 10;        
    }

    public function getMetaProduct(): ?array
    {
        return[
            'title'=>$this->title,
            'description'=>"purchase of product #". $this->id,
            'price'=>$this->getAmountProduct()
        ];
    }

    public function getUniqueId(): string
    {
        return (string)$this->getKey();
    }

    // boot method
    protected static function boot(){
        parent::boot();

        static::created(function ($task){
            $task->update(['slug'=>$task->title]);

        });


    }

    public function setSlugAttribute($value){
        if(static::whereSlug($slug=str_slug($value))->exists()){
            $slug="{$slug}-{$this->id}";
        }
        $this->attributes['slug']=$slug;
    }
    
    protected $fillable = [
        'title','description','slug','user_id','status','developer_id','category_id','min_budget','max_budget','mode','location'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function skills(){
        return $this->belongsToMany('App\Skill');
    }
    public function attachments(){
        return $this->morphMany('App\Attachment','attachee');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function review(){
        return $this->hasOne('App\Review');
    }
    public function bids(){
        return $this->hasMany('App\Bid');
    }
}
