<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class WorkContract extends Model
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
    protected $fillable = [
        'hiring_date',
        'end_date',
        'examination_date',
        'dismissal_date',
        'flag_fixed_term',
        'term',
        'new_end_date',
        'new_term',
        'contracting_regime_id',
        'address_id',
        'employee_id',
    ];

    /**
     * Define atributos para não mostrar após a serialização dos dados
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Mapeamento do relacionamento com regime de contratação
     */
    public function contracting_regime(){
        return $this->belongsTo(ContractingRegime::class);
    }

    /**
     * Mapeamento do relacionamento com endereço
     */
    public function address(){
        return $this->belongsTo(Address::class);
    }

    /**
     * Mapeamento do relacionamento com colaborador
     */
    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    /**
     * Mapeamento do relacionamento com benefícios fiscais
     */
    public function tax_benefits(){
        return $this->HasMany(TaxBenefit::class);
    }
}
