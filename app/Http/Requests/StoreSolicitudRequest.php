<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSolicitudRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'                 => 'required|email',
            'celular'               => 'required',
            'region'                => 'required',
            'comuna'                => 'required',
            'direccion'             => 'required',
/*             'rut_pensionado'        => ['required', function($attribute,$value,$fail){
                                        self::validateRut($value,$fail);
                                    }],
            'dv_pensionado'         => 'required', */
            'porc_retiro'           => 'nullable',
            'monto_retiro'          => 'nullable',
            'deudor_alimentos'      => 'required',
            'aceptar_condiciones'   => 'required',
        ];
    }

	/**
	 *	Función de validación de un rut basado en el algoritmo chileno
	 *	el formato de entrada es ########-# en donde deben ser sólo
	 *	números en la parte izquierda al guión y número o k en el
	 *	dígito verificador
	 */

    public static function validateRut($value,$fail)
	{

        $suma='';
        if(strpos($value,"-")==false){
            $RUT[0] = substr($value, 0, -1);
            $RUT[1] = substr($value, -1);
        }else{
            $RUT = explode("-", trim($value));
        }
        $elRut = str_replace(".", "", trim($RUT[0]));
        $factor = 2;
        for($i = strlen($elRut)-1; $i >= 0; $i--):
            $factor = $factor > 7 ? 2 : $factor;
            $suma += $elRut[$i]*$factor++;
        endfor;
        $resto = $suma % 11;
        $dv = 11 - $resto;
        if($dv == 11){
            $dv=0;
        }else if($dv == 10){
            $dv="k";
        }else{
            $dv=$dv;
        }
        if(!$dv == trim(strtolower($RUT[1]))){
            $fail = ['El numero de rut es inválido.'];
            return $fail;
        }

        return true;
    }



/* 	public static function validateRut ($value,$fail) {
        if (!preg_match("/^[0-9]+-[0-9kK]{1}/",$value)){
            $fail = ['El numero de rut es inválido.'];
            return $fail;
        }
		$rut = explode('-', $value);
		if(strtolower($rut[1]) == self::dv($rut[0])){

        };
	}

	public static function dv($T) {
		$M=0;$S=1;
        for(;$T;$T=floor($T/10))
			$S=($S+$T%10*(9-$M++%6))%11;

		return $S?$S-1:'k';
	} */
}