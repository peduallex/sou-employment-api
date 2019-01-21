<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
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
    protected $fillable = ['course', 'education_level', 'education_institution', 'starting_date', 'finishing_date', 'employee_id'];

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
}
