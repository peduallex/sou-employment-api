<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    /**
     * Define o atributo para deleção lógica     
     */
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Indica o atributo para não definir dados em massa     
     */
    protected $guarded = ['id'];

    /**
     * Indica os atributos para definir dados em massa     
     */
    protected $fillable = ['date_issued', 'description', 'number', 'series_number', 'state_issued', 'zone', 'section', 'identity_type_id', 'issuing_entity_id'];

    /**
     * Define atributos para não mostrar após a serialização dos dados
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Mapeamento do relacionamento com tipo de identidade
     */
    public function identity_type(){
        return $this->belongsTo(IdentityType::class);
    }

    /**
     * Mapeamento do relacionamento com entidade emissora
     */
    public function issuing_entity(){
        return $this->belongsTo(IssuingEntity::class);
    }

    /**
     * Mapeamento do relacionamento com colaboradores
     */
    public function employees(){
        return $this->belongsToMany(Employee::class, 'employee_identity')->withTimestamps();
    }
}
