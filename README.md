# API de Gestión de Productos Financieros de ACME

Este proyecto tiene como objetivo desarrollar una API para gestionar el nuevo modelo de negocio orientado a los productos de ahorro y crédito de la compañía **ACME**, que busca atraer nuevos clientes naturales y jurídicos. Esta API soporta el modelado de datos para administrar información relacionada con personas (naturales y jurídicas), cuentas de ahorro, tarjetas de crédito, entre otros.

## Requerimientos

ACME necesita una base unificada de datos para administrar las siguientes entidades y sus relaciones:

### Personas
- **Personas Naturales**: Datos básicos de individuos, incluyendo:
  - Tipo de Documento
  - Número de Documento
  - Nombres
  - Apellidos
  - Departamento y Municipio de Residencia
  
  **Tipos de documento**:  
  - Cedula de Ciudadanía (mayores de edad)
  - Tarjeta de Identidad (menores de edad)
  - Pasaporte o Cedula de Extranjería (extranjeros)

- **Personas Jurídicas**: Datos de la empresa, incluyendo:
  - NIT
  - Razón Social
  - Tipo de Empresa (Sociedad Anónima, Limitada, etc.)
  - Representante Legal
  - Composición Accionaria (uno a muchos accionistas)

  **Notas**: Las personas jurídicas solo tienen el tipo de documento NIT.

### Productos Financieros

#### Cuenta de Ahorro
- **Datos requeridos**:
  - Número de Cuenta (único y autogenerado)
  - Saldo Total
  - Saldo en Canje
  - Saldo Disponible
  - Estado de la Cuenta (ACTIVA o INACTIVA)
  
- **Movimientos**:
  - Depósitos en Efectivo (+)
  - Depósitos en Cheques (+)
  - Retiros (-)
  
  Cada movimiento debe estar asociado a:
  - Fecha de Transacción
  - Número Único de Transacción
  
  **Relación con personas**: Las cuentas pueden ser titulares de una o más personas (naturales o jurídicas).

#### Tarjeta de Crédito
- **Datos requeridos**:
  - Franquicia (Visa, MasterCard, American Express, Diners)
  - Número de Tarjeta emitida
  - Cupo Aprobado
  - Cupo Disponible
  - Estado de la Tarjeta (ACTIVA o INACTIVA)
  
- **Movimientos**:
  - Compras Nacionales (-)
  - Cuota de Manejo (-)
  - Pago de Tarjeta (+)
  - Retiros por Avance (-)
  
  Cada transacción debe estar asociada a:
  - Fecha de la Transacción
  - Número Único de Transacción
  
  **Relación con personas**: Una tarjeta de crédito solo puede ser asignada a un titular.

---

## API Endpoints

La API proporciona los siguientes endpoints para gestionar los productos financieros y las personas asociadas:

### Endpoints de Consulta

- `GET /departamentos`: Obtiene la lista de departamentos.
- `GET /municipios/{departamentoId}`: Obtiene la lista de municipios de un departamento específico. Se debe proporcionar el `departamentoId`.
- `GET /tipos-persona`: Obtiene los tipos de personas disponibles (Persona Natural, Persona Jurídica, etc.).
- `GET /tipos-documento`: Obtiene los tipos de documentos disponibles (Cédula de Ciudadanía, Tarjeta de Identidad, Pasaporte, etc.).
- `GET /tipos-empresa`: Obtiene los tipos de empresa disponibles (Sociedad Anónima, Sociedad Limitada, etc.).
- `GET /tipos-movimiento/{tipoCuenta}`: Obtiene los tipos de movimientos disponibles para un tipo de cuenta específico (Cuenta de Ahorro, Tarjeta de Crédito, etc.).
- `GET /franquicias`: Obtiene las franquicias de tarjetas de crédito disponibles (Visa, MasterCard, American Express, Diners).
- `GET /roles`: Obtiene los roles disponibles (Colaborador, Cliente, Accionista, Representante Legal, etc.).

### Endpoints de Creación

- `POST /crear-persona`: Crea una nueva persona (natural o jurídica).
  - **Body**: Datos de la persona (nombre, tipo de documento, etc.).
  
- `POST /crear-cuenta-ahorro`: Crea una nueva cuenta de ahorro.
  - **Body**: Datos de la cuenta (número de cuenta, saldo, etc.).

- `POST /movimiento-cuenta-ahorro`: Registra un movimiento en una cuenta de ahorro (depósito, retiro, etc.).
  - **Body**: Datos del movimiento (monto, tipo de movimiento, etc.).

- `POST /crear-tarjeta-credito`: Crea una nueva tarjeta de crédito.
  - **Body**: Datos de la tarjeta (número de tarjeta, franquicia, cupo aprobado, etc.).

- `POST /movimiento-tarjeta-credito`: Registra un movimiento en una tarjeta de crédito (compra, pago, etc.).
  - **Body**: Datos del movimiento (monto, tipo de movimiento, etc.).

---

## Modelo de Datos

La API utiliza un esquema de base de datos relacional con las siguientes tablas:

- **Personas**: Tabla que almacena los datos de las personas (naturales y jurídicas).
- **Cuentas de Ahorro**: Tabla para las cuentas de ahorro y sus movimientos.
- **Tarjetas de Crédito**: Tabla para las tarjetas de crédito y sus movimientos.
- **Movimientos**: Tabla para registrar todos los movimientos relacionados con cuentas de ahorro y tarjetas de crédito.

---

## Estrategia Comercial

ACME está implementando productos de ahorro y crédito como parte de su estrategia comercial para competir con bancos y otras entidades financieras, ofreciendo condiciones de negocio atractivas para clientes naturales y jurídicos.

### Objetivos principales de ACME:
- **Atraer nuevos clientes naturales y jurídicos** con productos como cuentas de ahorro y tarjetas de crédito.
- **Facilitar la obtención de productos financieros**, con condiciones diferenciadas que compitan en el mercado financiero.

---
