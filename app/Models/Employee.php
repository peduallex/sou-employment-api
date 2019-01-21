<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
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

    protected $primaryKey = 'id';

    /**
     * Indica os atributos para definir dados em massa
     */
    protected $fillable = [
        'name',
        'last_name',
        'birth_date',
        'gender',
        'cpf',
        'blood_type',
        'organ_donor',
        'assumed_name',
        'flag_pwd',
        'flag_visually',
        'flag_hearing',
        'flag_physically',
        'flag_intellectually',
        'description_other_pwd',
        'first_job_ctps',
        'first_job_public',
        'icd',
        'department_id',
        'marital_status_id',
        'city_id',
        'country_id',
        'address_id',
        'ethnicity_id',
        'occupation_id',
        'nationality_id',
    ];

    /**
     * Define atributos para não mostrar após a serialização dos dados
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Mapeamento do relacionamento com departamento
     */
    public function department(){
        return $this->belongsTo(Department::class);
    }

    /**
     * Mapeamento do relacionamento com estado civil
     */
    public function marital_status(){
        return $this->belongsTo(MaritalStatus::class);
    }

    /**
     * Mapeamento do relacionamento com cidade
     */
    public function city(){
        return $this->belongsTo(City::class);
    }

    /**
     * Mapeamento do relacionamento com país
     */
    public function country(){
        return $this->belongsTo(Country::class);
    }

    /**
     * Mapeamento do relacionamento com endereço
     */
    public function address(){
        return $this->belongsTo(Address::class);
    }

    /**
     * Mapeamento do relacionamento com etnia
     */
    public function ethnicity(){
        return $this->belongsTo(Ethnicity::class);
    }

    /**
     * Mapeamento do relacionamento com ocupação
     */
    public function occupation(){
        return $this->belongsTo(Occupation::class);
    }

    public function nationality(){
        return $this->belongsTo(Nationality::class);
    }

    /**
     * Mapeamento do relacionamento com dependentes
     */
    public function dependents(){
        return $this->hasMany(Dependent::class);
    }

    /**
     * Mapeamento do relacionamento com nível escolar
     */
    public function education(){
        return $this->hasMany(Education::class);
    }

    /**
     * Mapeamento do relacionamento com contratos de trabalho
     */
    public function work_contracts(){
        return $this->hasMany(WorkContract::class);
    }

    /**
     * Mapeamento do relacionamento com emails
     */
    public function emails(){
        return $this->belongsToMany(Email::class, 'employee_email')->withTimestamps();
    }

    /**
     * Mapeamento do relacionamento com telefones
     */
    public function telephones(){
        return $this->belongsToMany(Telephone::class, 'employee_telephone')->withTimestamps();
    }

    /**
     * Mapeamento do relacionamento com identidades
     */
    public function identities(){
        return $this->belongsToMany(Identity::class, 'employee_identity')->withTimestamps();
    }

    /**
     * Mapeamento do relacionamento com parentesco
     */
    public function parentages(){
        return $this->belongsToMany(Parentage::class, 'employee_parentage')->withTimestamps();
    }

    public function tax_benefits()
    {
        return $this->hasManyThrough(TaxBenefit::class, WorkContract::class, 'employee_id', 'work_contract_id');
    }
}
