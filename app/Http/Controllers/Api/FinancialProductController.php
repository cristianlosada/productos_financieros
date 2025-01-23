<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Process\Process;
use Illuminate\Support\Str;
use Carbon\Carbon;

class FinancialProductController extends Controller
{
    // constructor
    public function __construct() {
    }

    /**
     * metodo para listar los departametnos
     */
    public function departamentos() {
        try {
            // consulta de los registros
            $resultado = DB::table('departamentos')
                ->select([
                    'id',
                    'descripcion',
                ])
                ->get();

            return response()->json([
                'success' => true,
                'data' => $resultado
            ], 200);
        } catch (\Exception $e) {
            // Loguear el error con detalles: archivo, línea y mensaje
            \Log::error("Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine());
            return response()->json([
                'sucess' => false,
                'data' => "Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine()
            ], 500);
        }
    }

    /**
     * metodo para listar los municipios
     */
    public function municipios($departamentoId) {
      try {
          // consulta de los registros
          $resultado = DB::table('municipios')
              ->select([
                  'id',
                  'descripcion',
              ])
              ->where('departamento_id', $departamentoId)
              ->get();

          return response()->json([
              'success' => true,
              'data' => $resultado
          ], 200);
      } catch (\Exception $e) {
          // Loguear el error con detalles: archivo, línea y mensaje
          \Log::error("Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine());
          return response()->json([
              'sucess' => false,
              'data' => "Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine()
          ], 500);
      }
  }

  /**
   * metodo para listar los tipos de personas
   */
  public function tiposPersonas() {
    try {
        // consulta de los registros
        $resultado = DB::table('tipos_persona')
            ->select([
                'id',
                'descripcion',
            ])
            ->get();

        return response()->json([
            'success' => true,
            'data' => $resultado
        ], 200);
    } catch (\Exception $e) {
        // Loguear el error con detalles: archivo, línea y mensaje
        \Log::error("Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine());
        return response()->json([
            'sucess' => false,
            'data' => "Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine()
        ], 500);
      }
    }

      /**
     * metodo para listar los tipos de documentos
     */
    public function tiposDocumentos() {
      try {
          // consulta de los registros
          $resultado = DB::table('tipos_documento')
              ->select([
                  'tipos_documento.id',
                  'tipos_documento.descripcion AS tipo_documento',
                  'tipos_persona.descripcion AS tipo_persona'
              ])
              ->join('tipos_persona', 'tipos_persona.id', 'tipos_documento.tipo_persona_id')
              ->get();

          return response()->json([
              'success' => true,
              'data' => $resultado
          ], 200);
      } catch (\Exception $e) {
          // Loguear el error con detalles: archivo, línea y mensaje
          \Log::error("Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine());
          return response()->json([
              'sucess' => false,
              'data' => "Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine()
          ], 500);
        }
      }

    /**
     * metodo para listar los tipos de empresas
     */
    public function tiposEmpresas() {
      try {
          // consulta de los registros
          $resultado = DB::table('tipos_empresa')
              ->select([
                  'id',
                  'descripcion',
              ])
              ->get();

          return response()->json([
              'success' => true,
              'data' => $resultado
          ], 200);
      } catch (\Exception $e) {
          // Loguear el error con detalles: archivo, línea y mensaje
          \Log::error("Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine());
          return response()->json([
              'sucess' => false,
              'data' => "Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine()
          ], 500);
        }
      }

    /**
     * metodo para listar los roles
     */
    public function roles() {
      try {
          // consulta de los registros
          $resultado = DB::table('roles')
              ->select([
                  'id',
                  'descripcion',
              ])
              ->get();

          return response()->json([
              'success' => true,
              'data' => $resultado
          ], 200);
      } catch (\Exception $e) {
          // Loguear el error con detalles: archivo, línea y mensaje
          \Log::error("Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine());
          return response()->json([
              'sucess' => false,
              'data' => "Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine()
          ], 500);
        }
      }

  /**
   * metodo para listar los tipos de movimientos
   */
  public function tiposMovimiento($tipoCuenta) {
    try {
        // consulta de los registros
        $resultado = DB::table('tipos_movimiento')
            ->select([
                'id',
                'descripcion',
            ])
            ->where('tipo_cuenta', $tipoCuenta)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $resultado
        ], 200);
    } catch (\Exception $e) {
        // Loguear el error con detalles: archivo, línea y mensaje
        \Log::error("Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine());
        return response()->json([
            'sucess' => false,
            'data' => "Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine()
        ], 500);
    }
  }

  /**
   * metodo para listar las franquicias
   */
  public function franquicias() {
    try {
        // consulta de los registros
        $resultado = DB::table('franquicias')
            ->select([
                'id',
                'descripcion',
            ])
            ->get();

        return response()->json([
            'success' => true,
            'data' => $resultado
        ], 200);
    } catch (\Exception $e) {
        // Loguear el error con detalles: archivo, línea y mensaje
        \Log::error("Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine());
        return response()->json([
            'sucess' => false,
            'data' => "Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine()
        ], 500);
    }
  }

    /**
     * Crea la persona
     */
    public function crearPersona(Request $request) {
      try {
          // Validar la solicitud
          $validator = Validator::make($request->all(), [
              'municipio_residencia_id' => 'required|integer',
              'tipo_documento_id' => 'required|integer',
              'tipo_persona_id' => 'required|integer',
              'numero_documento' => 'required|string|max:20',
              'nombres' => 'required_if:tipo_persona_id,1|string|max:100',
              'apellidos' => 'required_if:tipo_persona_id,1|string|max:100',
              'tipo_empresa_id' => 'required_if:tipo_persona_id,2|integer',
              'representante_legal_id' => 'required_if:tipo_persona_id,2|integer',
              'razon_social' => 'required_if:tipo_persona_id,2|string',
              'roles' => 'required|array',
              'accionistas' => 'required_if:tipo_persona_id,2|array',
          ]);

          // Verificar si la validación falla
          if ($validator->fails()) {
              return response()->json([
                  'success' => false,
                  'data' => $validator->errors()->toJson(),
              ], 400);
          }

          // verifica la existencia del municipio
          $municipio = DB::table('municipios')->find($request->municipio_residencia_id);
          if (!$municipio) {
            return response()->json([
              'success' => false,
              'data' => 'El municipio no existe',
            ], 400);
          }
          // verifica la existencia del tipo de documento
          $tipo_documento = DB::table('tipos_documento')->find($request->tipo_documento_id);
          if (!$tipo_documento) {
            return response()->json([
              'success' => false,
              'data' => 'El tipo de documento no existe',
            ], 400);
          }
          // verifica la existencia del tipo de persona
          $tipo_persona = DB::table('tipos_persona')->find($request->tipo_persona_id);
          if (!$tipo_persona) {
            return response()->json([
              'success' => false,
              'data' => 'El tipo de persona no existe',
            ]);
          }

          //valida que el tipo de documento del request coincida la seleccion del tipo de persona del request con el de la tabla de tipo de persona
          if ($request->tipo_persona_id != $tipo_documento->tipo_persona_id) {
            return response()->json([
              'success' => false,
              'data' => 'El tipo de documento no coincide con el tipo de persona',
            ], 400);
          }

          // validar que el numero de documento y el tipo no exista
          $personaExiste = DB::table('personas')
            ->where('numero_documento', $request->numero_documento)
            ->where('tipo_documento_id', $request->tipo_documento_id)
            ->first();
          
          if ($personaExiste) {
            return response()->json([
              'success' => false,
              'data' => 'El número de documento y el tipo de documento ya existe asignado en otra persona',
            ], 400);
          }

          if ($request->tipo_persona_id == 2) {
            // verifica la existencia del tipo de empresa
            $tipo_empresa = DB::table('tipos_empresa')->find($request->tipo_empresa_id);
            if (!$tipo_empresa) {
              return response()->json([
                'success' => false,
                'data' => 'El tipo de empresa no existe',
              ], 400);
            }

            // verifica la existencia del representante legal en la tabla de personas
            $representante_legal = DB::table('personas')->find($request->representante_legal_id);
            if (!$representante_legal) {
              return response()->json([
                'success' => false,
                'data' => 'El representante legal no existe',
              ], 400);
            }

            // valida la existencia de las personas que llegan como accionistas
            $accionistas = DB::table('personas')->whereIn('id', $request->accionistas)->get();
            if (count($accionistas) != count($request->accionistas)) {
              return response()->json([
                'success' => false,
                'data' => 'Algunos accionistas no existen',
              ], 400);
            }
          }

          // valida la existencia de esos roles
          $roles = DB::table('roles')->whereIn('id', $request->roles)->get();
          if (count($roles) != count($request->roles)) {
            return response()->json([
              'success' => false,
              'data' => 'Algunos roles no existen',
            ], 400);
          }

          //crea la persona con DB
          $persona = DB::table('personas')->insertGetId([
            'municipio_residencia_id' => $request->municipio_residencia_id,
            'departamento_residencia_id' => $municipio->departamento_id,
            'tipo_documento_id' => $request->tipo_documento_id,
            'tipo_persona_id' => $request->tipo_persona_id,
            'numero_documento' => $request->numero_documento,
          ]);

          // crea los roles de la persona en la tabla persona_roles asignando cada rol a la persona
          foreach ($request->roles as $rol) {
            DB::table('personas_roles')->insert([
              'persona_id' => $persona,
              'rol_id' => $rol,
            ]);
          }

          if ($tipo_documento->tipo_persona_id == 1) { // persona natural
            // crea en la tabla personas_naturales los nombres y apellidos
            DB::table('personas_naturales')->insert([
              'persona_id' => $persona,
              'nombres' => $request->nombres,
              'apellidos' => $request->apellidos,
            ]);
          } else if ($tipo_documento->tipo_persona_id == 2) { // persona juridica
            // crea en la tabla personas_juridicas tipo_empresa_id, representante_legal_id, razon_social
            $empresa = DB::table('personas_juridicas')->insertGetId([
              'persona_id' => $persona,
              'tipo_empresa_id' => $request->tipo_empresa_id,
              'representante_legal_id' => $request->representante_legal_id,
              'razon_social' => $request->razon_social,
            ]);

            // agregar relacion de accionistas de la persona juridica
            if ($request->accionistas) {
              foreach ($request->accionistas as $accionista) {
                DB::table('accionistas')->insert([
                  'empresa_id' => $empresa,
                  'persona_id' => $accionista,
                ]);
              }
            }
          }

          return response()->json([
              'success' => true,
              'data' => 'Se ha creado la persona' 
          ], 200);
      } catch (\Exception $e) {
          // Loguear el error con detalles: archivo, línea y mensaje
          \Log::error("Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine());
          return response()->json([
              'sucess' => false,
              'data' => "Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine()
          ], 500);
      }
  }

  /**
   * Crea la cuenta ahorro
   */
  public function crearCuentaAhorro(Request $request) {
    try {
        // Validar la solicitud
        $validator = Validator::make($request->all(), [
            'titulares' => 'required|array',
        ]);

        // Verificar si la validación falla
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->errors()->toJson(),
            ], 400);
        }

        // valida la existencia de esos titulares
        $titulares = DB::table('personas')->whereIn('id', $request->titulares)->get();
        if (count($titulares) != count($request->titulares)) {
          return response()->json([
            'success' => false,
            'data' => 'Algunos titulares no existen',
          ], 400);
        }

        // crea dinamicamente un numero de cuenta en base a un patron definifo de numeros aleatorios
        // Define el patrón inicial
        $patron = '00040000000003000000';

        // Genera un número de cuenta dinámico
        $numeroCuenta = '';
        foreach (str_split($patron) as $char) {
            if ($char === '0') {
                $numeroCuenta .= mt_rand(0, 9); // Reemplaza '0' con un número aleatorio entre 0 y 9
            } else {
                $numeroCuenta .= $char; // Mantiene los caracteres fijos
            }
        }

        //crea la cuenta con DB
        $cuenta = DB::table('cuentas_ahorro')->insertGetId([
          'numero_cuenta' => $numeroCuenta,
        ]);

        // agregar relacion de accionistas de la persona juridica
        if ($request->titulares) {
          $i = 0;
          foreach ($request->titulares as $titular) {
            DB::table('cuentas_ahorro_titulares')->insert([
              'cuenta_id' => $cuenta,
              'titular_id' => $titular,
              'titular_principal' => $i == 0 ? 1 : 0
            ]);
            $i++;
          }
        }

        return response()->json([
            'success' => true,
            'data' => 'Se ha creado la cuenta de ahorro' 
        ], 200);
    } catch (\Exception $e) {
        // Loguear el error con detalles: archivo, línea y mensaje
        \Log::error("Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine());
        return response()->json([
            'sucess' => false,
            'data' => "Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine()
        ], 500);
    }
  }

  /**
   * Crea el movimiento de la cuenta de ahorros
   */
  public function crearMovimientoAhorros(Request $request) {
    try {
        // Validar la solicitud
        $validator = Validator::make($request->all(), [
            'cuenta_id'       => 'required|integer',
            'monto'           => 'required|numeric',
            'tipo_movimiento' => 'required|integer',
        ]);

        // Verificar si la validación falla
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->errors()->toJson(),
            ], 400);
        }

        // valida la existencia de esos cuentas de ahorro
        $cuenta = DB::table('cuentas_ahorro')->find($request->cuenta_id);
        if (!$cuenta) {
          return response()->json([
            'success' => false,
            'data' => 'La cuenta de ahorro no existe',
          ], 400);
        }

        // valida el tipo de movimiento con condicion de (tipo_cuenta = 0) => cuenta_ahorro
        $tipoMovimiento = DB::table('tipos_movimiento')->where('tipo_cuenta', 0)->where('id', $request->tipo_movimiento)->first();

        if (!$tipoMovimiento) {
          return response()->json([
            'success' => false,
            'data' => 'El tipo de movimiento no es válido',
          ], 400);
        }

        // valida que si es un retiro entonces el saldo disponible de la cuenta no sea menor al monto a retirar
        if ($request->tipo_movimiento == 3) {
          $saldoDisponible = $cuenta->saldo_disponible;
          if ($saldoDisponible < $request->monto) {
            return response()->json([
              'success' => false,
              'data' => 'El monto a retirar no puede ser mayor al saldo disponible',
            ], 400);
          }
        }

        // Define el patrón inicial
        $patron = '99000000000030000000000000000000700000005000000000';

        // Genera un número de cuenta dinámico
        $numeroCuenta = '';
        foreach (str_split($patron) as $char) {
            if ($char === '0') {
                $numeroCuenta .= mt_rand(0, 9); // Reemplaza '0' con un número aleatorio entre 0 y 9
            } else {
                $numeroCuenta .= $char; // Mantiene los caracteres fijos
            }
        }

        // Crea el movimiento en la tabla 'movimientos_cuentas_ahorro'
        $movimiento = DB::table('movimientos_cuentas_ahorro')->insertGetId([
          'cuenta_id' => $request->cuenta_id,
          'tipo_movimiento_id' => $request->tipo_movimiento,
          'numero_transaccion' => $numeroCuenta,
          'monto' => $request->monto,
          'fecha_transaccion' => Carbon::now()
        ]);

        // Si el tipo de movimiento es Depósito en Cheque
        if ($request->tipo_movimiento == 2) {
          // Define el patrón inicial
          $patron = '85000000000030000000000000000000700000005000000000';

          // Genera un número de cuenta dinámico
          $numeroCuenta = '';
          foreach (str_split($patron) as $char) {
              if ($char === '0') {
                  $numeroCuenta .= mt_rand(0, 9); // Reemplaza '0' con un número aleatorio entre 0 y 9
              } else {
                  $numeroCuenta .= $char; // Mantiene los caracteres fijos
              }
          }
          $movimientoCanje = DB::table('aprobaciones_canje')->insertGetId([
              'cuenta_id' => $request->cuenta_id,
              'movimiento_cuenta_ahorro_id' => $movimiento, // Usar directamente el ID
              'monto_canje' => $request->monto,
              'estado_aprobacion' => 'En canje',
              'numero_transaccion' => $numeroCuenta,
              'fecha_solicitud' => Carbon::now(),
          ]);
        }

        if (in_array($request->tipo_movimiento, [1, 2])) { 
          // Tipo 1: Depósito en efectivo; Tipo 2: Depósito en cheque
          $operador = '+';
        } elseif ($request->tipo_movimiento == 3) { 
            // Tipo 3: Retiro
            $operador = '-';
        } else {
            // Manejo de un tipo de movimiento no válido
            return response()->json(['error' => 'Tipo de movimiento no válido'], 400);
        }
        
        // Actualizar los saldos según el tipo de movimiento
        $actualizacion = [
            'saldo_total' => DB::raw('saldo_total ' . $operador . ' ' . $request->monto),
        ];
        
        if ($request->tipo_movimiento == 1) {
            // Depósito en efectivo: afecta saldo disponible
            $actualizacion['saldo_disponible'] = DB::raw('saldo_disponible ' . $operador . ' ' . $request->monto);
        } elseif ($request->tipo_movimiento == 2) {
            // Depósito en cheque: afecta saldo canje
            $actualizacion['saldo_canje'] = DB::raw('saldo_canje ' . $operador . ' ' . $request->monto);
        } elseif ($request->tipo_movimiento == 3) {
            // Retiro: afecta saldo disponible
            $actualizacion['saldo_disponible'] = DB::raw('saldo_disponible ' . $operador . ' ' . $request->monto);
        }
        
        // Actualizar en la base de datos
        $cuentaActualizada = DB::table('cuentas_ahorro')
            ->where('id', $request->cuenta_id)
            ->update($actualizacion);

        return response()->json([
            'success' => true,
            'data' => 'Se ha creado un movimiento a la cuenta de ahorro' 
        ], 200);
    } catch (\Exception $e) {
        // Loguear el error con detalles: archivo, línea y mensaje
        \Log::error("Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine());
        return response()->json([
            'sucess' => false,
            'data' => "Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine()
        ], 500);
    }
  }

    /**
   * Crea la cuenta ahorro
   */
  public function crearTarjetaCredito(Request $request) {
    try {
        // Validar la solicitud
        $validator = Validator::make($request->all(), [
            'persona' => 'required|integer',
            'franquicia_id' => 'required|integer',
        ]);

        // Verificar si la validación falla
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->errors()->toJson(),
            ], 400);
        }

        // valida la existencia de esos personaes
        $persona = DB::table('personas')->find($request->persona);
        if (!$persona) {
          return response()->json([
            'success' => false,
            'data' => 'No existe la persona a titular',
          ], 400);
        }

        // valida la existencia de esos personaes
        $franquicia = DB::table('franquicias')->find($request->franquicia_id);
        if (!$franquicia) {
          return response()->json([
            'success' => false,
            'data' => 'No existe la franquicia',
          ], 400);
        }

        // validar que no exista la misma franquicia para la misma persona
        $tarjeta = DB::table('tarjetas_credito')->where('titular_id', $request->persona)
          ->where('franquicia_id', $request->franquicia_id)
          ->first();

        if ($tarjeta) {
          return response()->json([
            'success' => false,
            'data' => 'Ya existe una tarjeta para la persona y la franquicia',
          ], 400);
        }

        // crea dinamicamente un numero de cuenta en base a un patron definifo de numeros aleatorios
        // Define el patrón inicial
        $patron = '4400000000000000';

        // Genera un número de cuenta dinámico
        $numeroCuenta = '';
        foreach (str_split($patron) as $char) {
            if ($char === '0') {
                $numeroCuenta .= mt_rand(0, 9); // Reemplaza '0' con un número aleatorio entre 0 y 9
            } else {
                $numeroCuenta .= $char; // Mantiene los caracteres fijos
            }
        }

        // definir un valor aleatorio cerrado en millones para un cupo de tc
        $cupoAprobado = mt_rand(100000, 10000000);
        // aproximar hacia arriba en cien miles
        $cupoAprobado = ceil($cupoAprobado / 100000) * 100000;

        //crea la cuenta con DB
        $tarjeta = DB::table('tarjetas_credito')->insertGetId([
          'titular_id' => $persona->id,
          'franquicia_id' => $franquicia->id,
          'numero_tarjeta' => $numeroCuenta,
          'fecha_emision' => Carbon::now(),
          'fecha_vencimiento' => Carbon::now()->addYears(5),
          'numero_seguridad' => mt_rand(0,9).mt_rand(0,9).mt_rand(0,9),
          'cupo_aprobado' => $cupoAprobado,
          'cupo_disponible' => $cupoAprobado
        ]);

        return response()->json([
            'success' => true,
            'data' => 'Se ha creado la tarjeta de credito' 
        ], 200);
    } catch (\Exception $e) {
        // Loguear el error con detalles: archivo, línea y mensaje
        \Log::error("Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine());
        return response()->json([
            'sucess' => false,
            'data' => "Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine()
        ], 500);
    }
  }

  /**
   * Crea el movimiento de la tarjeta credito
   */
  public function crearMovimientoTarjetaCredito(Request $request) {
    try {
        // Validar la solicitud
        $validator = Validator::make($request->all(), [
            'tarjeta_id'       => 'required|integer',
            'monto'           => 'required|numeric',
            'tipo_movimiento' => 'required|integer',
        ]);

        // Verificar si la validación falla
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => $validator->errors()->toJson(),
            ], 400);
        }

        // valida la existencia de esos cuentas de ahorro
        $cuenta = DB::table('tarjetas_credito')->find($request->tarjeta_id);
        if (!$cuenta) {
          return response()->json([
            'success' => false,
            'data' => 'La tarjeta de credito no existe',
          ], 400);
        }

        // valida el tipo de movimiento con condicion de (tipo_cuenta = 1) => tarjeta credito
        $tipoMovimiento = DB::table('tipos_movimiento')->where('tipo_cuenta', 1)->where('id', $request->tipo_movimiento)->first();

        if (!$tipoMovimiento) {
          return response()->json([
            'success' => false,
            'data' => 'El tipo de movimiento no es válido',
          ], 400);
        }

        // valida que si es un compra nacional = 4, cuota de manejo = 5, retiro = 7 entonces el cupo disponible de la cuenta no sea menor al monto a generar
        if (in_array($request->tipo_movimiento, [4,5,7])) {
          $cupoDisponible = $cuenta->cupo_disponible;
          if ($cupoDisponible < $request->monto) {
            return response()->json([
              'success' => false,
              'data' => 'transaccion no valida sin saldo disponible',
            ], 400);
          }
        }

        // Define el patrón inicial
        $patron = '98000000000030000000000000000000700000005000000000';

        // Genera un número de cuenta dinámico
        $numeroCuenta = '';
        foreach (str_split($patron) as $char) {
            if ($char === '0') {
                $numeroCuenta .= mt_rand(0, 9); // Reemplaza '0' con un número aleatorio entre 0 y 9
            } else {
                $numeroCuenta .= $char; // Mantiene los caracteres fijos
            }
        }

        // Crea el movimiento en la tabla 'movimientos_tarjetas_credito'
        $movimiento = DB::table('movimientos_tarjetas_credito')->insertGetId([
          'tarjeta_credito_id' => $request->tarjeta_id,
          'tipo_movimiento_id' => $request->tipo_movimiento,
          'numero_transaccion' => $numeroCuenta,
          'monto' => $request->monto,
          'fecha_transaccion' => Carbon::now()
        ]);

        if (in_array($request->tipo_movimiento, [6])) { 
          // Tipo 1: Depósito en efectivo; Tipo 2: Depósito en cheque
          $operador = '+';
        } elseif (in_array($request->tipo_movimiento, [4,5,7])) { 
            // Tipo 3: Retiro
            $operador = '-';
        } else {
            // Manejo de un tipo de movimiento no válido
            return response()->json(['error' => 'Tipo de movimiento no válido'], 400);
        }
        
        // Actualizar los saldos según el tipo de movimiento
        $actualizacion = [
            'cupo_disponible' => DB::raw('cupo_disponible ' . $operador . ' ' . $request->monto),
        ];
        
        // Actualizar en la base de datos
        $cuentaActualizada = DB::table('tarjetas_credito')
            ->where('id', $request->tarjeta_id)
            ->update($actualizacion);

        return response()->json([
            'success' => true,
            'data' => 'Se ha creado un movimiento a la tarjeta de credito' 
        ], 200);
    } catch (\Exception $e) {
        // Loguear el error con detalles: archivo, línea y mensaje
        \Log::error("Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine());
        return response()->json([
            'sucess' => false,
            'data' => "Error: " . $e->getMessage() . " in file: " . $e->getFile() . " on line: " . $e->getLine()
        ], 500);
    }
  }
}
