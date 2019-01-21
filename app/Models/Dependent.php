<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
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
    protected $fillable = ['name', 'birth_date', 'cpf', 'employee_id', 'dependent_type_id'];

    /**
     * Define atributos para não mostrar após a serialização dos dados
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Mapeamento do relacionamento com colaborador
     */
    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    /**
     * Mapeamento do relacionamento com tipo de dependente
     */
    public function dependent_type(){
        return $this->belongsTo(DependentType::class);
    }
}
