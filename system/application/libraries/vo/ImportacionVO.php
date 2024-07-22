<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Flete
{
	/**
	 * Monto total de flete del DUA en dolares
	 */
	private $totalDolaresDUA = 0;

	/**
	 * Monto total del flete en dolares
	 */
	private $totalDolares = 0;

	/**
	 * Monto total en moneda nacional (SOLES)
	 */
	private $totalSoles = 0;

	/**
	 * Array de items
	 */
	private $items = array();

	/**
	 * obtiene el total en dolares
	 */
	public function getTotalDolares()
	{
		return $this->totalDolares;
	}

	/**
	 * 
	 */
	public function getTotalDolaresDUA()
	{
		return $this->totalDolaresDUA;
	}

	public function setTotalDolaresDUA($monto)
	{
		$this->totalDolaresDUA += $monto;
	}

	/**
	 * Obtiene el total en soles
	 */
	public function getTotalSoles()
	{
		return $this->totalSoles;
	}

	/**
	 * obtiene los items
	 */
	public function getItems()
	{
		return $this->items;
	}

	/**
	 * Agrega un nuevo flete
	 */
	public function add($id, $nombre, $cantidad, $precio, $moneda, $tdc, $tdcDolar)
	{
		$monto = round($precio * $cantidad, 2);
		$montoSoles = round($monto * $tdc, 2);
		$montoDolares = round($montoSoles / $tdcDolar, 2);

		$item = array(
			'nombre' => $nombre,
			'cantidad' => $cantidad,
			'precio' => $precio,
			'total' => $monto,
			'moneda' => $moneda, //Simbolo de la moneda
			'totalSoles' => $montoSoles,
			'totalDolares' => $montoDolares,
			'tdc' => $tdc,
			'tdcDolar' => $tdcDolar
		);


		$this->totalSoles += $montoSoles;
		$this->totalDolares += $montoDolares;
		$this->items[] = $item;
	}
}

/**
* 
*/
class Products
{
	/**
	 * total en moneda real de compra
	 */
	private $total = 0;

	/**
	 * total en soles
	 */
	private $totalSoles = 0;

	/**
	 * total en dolares
	 */
	private $totalDolares = 0;

	private $unitarioGastoDolares = 0;

	/**
	 * total de gastos en dolares
	 */
	private $totalGastoDolares = 0;

	private $unitarioCostoDolares = 0;

	/**
	 * total de costo en dolares
	 */
	private $totalCostoDolares = 0;

	/**
	 * total unitario
	 */
	private $totalUnitario = 0;

	private $totalUnitarioDolares = 0;

	/**
	 * Array items
	 */
	private $items = array();

	/**
	 * 
	 */
	public function getTotal()
	{
		return $this->total;
	}

	public function getTotalUnitarioDolares()
	{
		return $this->totalUnitarioDolares;
	}

	/**
	 * 
	 */
	public function getTotalSoles()
	{
		return $this->totalSoles;
	}

	/**
	 * 
	 */
	public function getTotalDolares()
	{
		return $this->totalDolares;
	}

	/**
	 * 
	 */
	public function getTotalGastoDolares()
	{
		return $this->totalGastoDolares;
	}

	public function getUnitarioGastoDolares()
	{
		return $this->unitarioGastoDolares;
	}

	public function getTotalUnitario()
	{
		return $this->totalUnitario;
	}

	public function getUnitarioCostoDolares()
	{
		return $this->unitarioCostoDolares;
	}

	/**
	 * 
	 */
	public function getTotalCostoDolares()
	{
		return $this->totalCostoDolares;
	}

	public function getItems()
	{
		return $this->items;
	}

	/**
	 * Agrega un nuevo articulo segun el array de parametros enviados
	 * $data => ['id', 'cantidad', 'uniMedida', 'descripcion', 'precio', 'moneda', 'tdc', 'tdcDolar', *'gastoUnitario']
	 */
	public function add($data)
	{
		$precioSoles = round($data['precio'] * $data['tdc'], 2);
		$precioDolar = round($precioSoles / $data['tdcDolar'], 2);

		/**
		 * Posible problema de precision
		 */
		$monto = round($data['precio'] * $data['cantidad'], 2);
		$montoSoles = round($monto * $data['tdc'], 2);
		$montoDolares = round($montoSoles / $data['tdcDolar'], 2);

		$item = $data;
		$item['precioSoles'] = $precioSoles;
		$item['precioDolar'] = $precioDolar;
		$item['total'] = $monto;
		$item['totalSoles'] = $montoSoles;
		$item['totalDolares'] = $montoDolares;
		/*prueba marco */
		/**
		 * monto de gasto en dolares
		 */
		if(isset($data['gastoUnitario']) && !is_null($data['gastoUnitario'])) {
			$gastoUnitario = $data['gastoUnitario'];
			$item['gastoUnitario'] = $gastoUnitario;
			$item['gastoTotal'] = round($gastoUnitario * $data['cantidad'], 2);

			$gastoUnitarioDolar = round(($gastoUnitario * $data["tdc"]) / $data["tdcDolar"], 2);
			$item['gastoUnitarioDolar'] = $gastoUnitarioDolar;
			$item['gastoTotalDolar'] = round($gastoUnitarioDolar * $data['cantidad'], 2);


			$item['precioLiquido'] = round($item['precioDolar'] + $item['gastoUnitarioDolar'], 2);
			$item['totalLiquido'] = round($item['precioLiquido'] * $item['cantidad'], 2);

			$this->unitarioGastoDolares += $gastoUnitarioDolar;
			$this->totalGastoDolares += $item['gastoTotalDolar'];
			$this->unitarioCostoDolares += $item['precioLiquido'];
			$this->totalCostoDolares += $item['totalLiquido'];
		}

		$this->items[] = $item;

		$this->totalUnitario += round($data['precio'], 2);
		$this->totalUnitarioDolares += round($precioDolar, 2);

		$this->total += $monto;
		$this->totalSoles += $montoSoles;
		$this->totalDolares += $montoDolares;
	}

	/**
	 * Calcular el porcentaje de gasto que le toca a cada producto segun un total suministrado y lo liquida
	 * $totalGasto => Monto en dolares
	 */
	public function liquidar($totalGasto)
	{
		if(count($this->items) > 0){
			foreach ($this->items as $index => $product) {
				$porcentaje = round($product['totalDolares'] / $this->getTotalDolares(), 2);
				$gastoUnitarioDolar = round(($totalGasto * $porcentaje) / $product['cantidad'], 2);
				$gastoUnitario = round(($gastoUnitarioDolar * $product['tdcDolar']) / $product['tdc'], 2);
				
				$this->items[$index]['gastoUnitario'] = $gastoUnitario;
				$this->items[$index]['gastoUnitarioDolar'] = $gastoUnitarioDolar;

				$this->items[$index]['gastoTotalDolar'] = $gastoTotal = round($gastoUnitarioDolar * $product['cantidad'], 2);
				$this->items[$index]['precioLiquido'] = $costoUnitario = round($gastoUnitarioDolar + $product['precioDolar'], 2);
				$this->items[$index]['totalLiquido'] = $costoTotal = round($this->items[$index]['precioLiquido'] * $product['cantidad'], 2);

				$this->unitarioGastoDolares += $gastoUnitarioDolar;
				$this->totalGastoDolares += $gastoTotal;
				$this->unitarioCostoDolares += $costoUnitario;
				$this->totalCostoDolares += $costoTotal;
			}
		}
	}
}

/**
* 
*/
class Gastos
{
	/**
	 * 
	 */
	private $totalDolares = 0;

	/**
	 * 
	 */
	private $totalSoles = 0;

	/**
	 * monto iGV
	 */
	private $montoIGV = 0;

	/**
	 * Monto total de igv en dolares
	 */
	private $totalIgvDolares = 0;

	private $totalDolaresAduana = 0;

	/**
	 * Array de gastos
	 */
	private $items = array();

	/**
	 * 
	 */
	public function getTotalDolares()
	{
		return $this->totalDolares;
	}

	public function getTotalDolaresAduana()
	{
		return $this->totalDolaresAduana;
	}

	public function getMontoIGV()
	{
		return $this->getTotalIgvDolares() - $this->getTotalDolares();
	}

	/**
	 * 
	 */
	public function getTotalSoles()
	{
		return $this->totalSoles;
	}

	/**
	 * 
	 */
	public function getTotalIgvDolares()
	{
		return $this->totalIgvDolares;
	}

	/**
	 * 
	 */
	public function getItems()
	{
		return $this->items;
	}

	/**
	 * $gasto = ['id', 'descripcion', 'cantidad', 'precio', 'igv', 'tdc', 'tdcDolar']
	 */
	public function add($gasto)
	{
		/**
		 * Sin igv
		 */
		$monto = round($gasto['precio'] * $gasto['cantidad'], 2);
		$montoSoles = round($monto * $gasto['tdc'], 2);
		$montoDolares = round($montoSoles / $gasto['tdcDolar'], 2);

		/**
		 * Con igv
		 */
		$montoIgv = round($monto * (1 + ($gasto['igv'] / 100)), 2);
		$montoIgvSoles = round($montoIgv * $gasto['tdc'], 2);
		$montoIgvDolares = round($montoIgvSoles / $gasto['tdcDolar'], 2);

		$gasto['monto'] = $monto;
		$gasto['montoSoles'] = $montoSoles;
		$gasto['montoDolares'] = $montoDolares;

		$gasto['montoIgv'] = $montoIgv;
		$gasto['montoIgvSoles'] = $montoIgvSoles;
		$gasto['montoIgvDolares'] = $montoIgvDolares;

		if($gasto['aduana']){
			array_unshift($this->items, $gasto);
		}else{
			$this->items[] = $gasto;
		}

		if($gasto['aduana']) $this->totalDolaresAduana += $montoDolares;

		$this->totalSoles += $montoSoles;
		$this->totalDolares += $montoDolares;

		$this->totalIgvDolares += $montoIgvDolares;
	}
}

/**
* 
*/
class ImportacionVO
{
	/**
	 * Array de productos
	 */
	private $products;

	/**
	 * Array de gastos adicionales
	 */
	private $gastos;

	/**
	 * Objeto flete
	 */
	private $flete;

	/**
	 * Monto de flete en dolares
	 */
	private $totalFlete;

	/**
	 * Total de costo de articulos o FOB
	 */
	private $fob;

	private $fobDUA = 0;

	private $adValorem = 0;

	private $tsaServicios = 0;

	private $percepcion = 0;

	/**
	 * Gasto por seguro
	 */
	private $seguro;

	/**
	 * porcentaje de I.P.M
	 */
	private $IPM = 2;

	/**
	 * porcentaje de igv
	 */
	private $IGV = 16;

	/**
	 * Total de I.P.M en dolares
	 */
	private $totalIPM;

	/**
	 * Monto total cif
	 * $fob + $gastos + $seguro
	 */
	private $cif;

	function __construct()
	{
		$this->products = new Products();
		$this->flete = new Flete();
		$this->gastos = new Gastos();
	}

	/**
	 * Obtiene el flete
	 */
	public function getFlete()
	{
		return $this->flete;
	}

	/**
	 * Obtiene los gastos
	 */
	public function getGastos()
	{
		return $this->gastos;
	}

	/**
	 * obtiene los productos
	 */
	public function getProducts()
	{
		return $this->products;
	}

	/**
	 * obtiene el fob
	 */
	public function getFOB()
	{
		if(is_null($this->fob)) $this->fob = $this->products->getTotalDolares();

		return $this->fob;
	}

	public function getFOBDUA()
	{
		return $this->fobDUA;
	}

	public function setFOBDUA($monto)
	{
		$this->fobDUA += $monto;
	}

	public function getAdvalorem()
	{
		return $this->adValorem;
	}

	public function setAdvalorem($monto)
	{
		$this->adValorem += $monto;
	}

	public function getTsaservicios()
	{
		return $this->tsaServicios;
	}

	public function setTsaservicios($monto)
	{
		$this->tsaServicios += $monto;
	}

	public function getPercepcion()
	{
		return $this->percepcion;
	}

	public function setPercepcion($monto)
	{
		$this->percepcion += $monto;
	}

	/**
	 * Obtiene el seguro
	 */
	public function getSeguro()
	{
		return $this->seguro;
	}

	public function setSeguro($monto)
	{
		$this->seguro += $monto;
	}

	/**
	 * Obtiene el total del flete
	 */
	public function getTotalFlete()
	{
		if(is_null($this->totalFlete)) $this->totalFlete = $this->flete->getTotalDolares();

		return $this->totalFlete;
	}

	/**
	 * Obtiene el monto del cif en dolares
	 */
	public function getCIF()
	{
		if(is_null($this->cif)) $this->cif = $this->getFOBDUA() + $this->flete->getTotalDolaresDUA() + $this->getSeguro();

		return $this->cif;
	}

	public function getIPM()
	{
		return $this->IPM;
	}

	/**
	 * calcula el monto total del IMP en dolares
	 */
	public function getTotalIPM()
	{
		 if(is_null($this->totalIPM)) $this->totalIPM = round($this->getCIF() * ($this->IPM / 100), 2);

		 return $this->totalIPM;
	}

	public function getIGV()
	{
		return $this->IGV;
	}

	/**
	 * calcula el monto de igv  en dolares
	 */
	public function getTotalIGV()
	{
		return $this->getCIF() * ($this->IGV / 100);
	}

	/**
	 * obtiene el total de derechos
	 */
	public function getTotalDerechos()
	{
		return $this->getTotalIGV() + $this->getTotalIPM() + $this->getAdvalorem() + $this->getTsaservicios() + $this->getPercepcion();
	}

	/**
	 * obtiene el total de la importacion en dolares
	 */
	public function getTotal()
	{
		return $this->getTotalDerechos() + $this->gastos->getTotalIgvDolares();
	}

	/**
	 * calcula el gastos total de la importacion
	 * $flete + $gasto aduanas
	 */
	public function getTotalGastos()
	{
		return $this->gastos->getTotalDolares() + $this->getTotalFlete();
	}

	/**
	 * Agrega un nuevo articulo segun el array de parametros enviados
	 * $data => ['id', 'cantidad', 'uniMedida', 'descripcion', 'precio', 'moneda', 'tdc', 'tdcDolar', *'gastoUnitario']
	 */
	public function addProduct($product)
	{
		//si flete  array($id, $nombre, $cantidad, $precio, $moneda, $tdc, $tdcDolar)
		if(is_null($product['uniMedida'])) {
			$this->addGasto($product);
		}else {
			$this->products->add($product);
		}
	}

	/**
	 * Agrega un nuevo gasto a la importacion
	 * $gasto = ['id', 'descripcion', 'cantidad', 'precio', 'igv', 'tdc', 'tdcDolar']
	 */
	public function addGasto($gasto)
	{
		//si flete  array($id, $nombre, $cantidad, $precio, $moneda, $tdc, $tdcDolar)
		if(preg_match("/flete/i", $gasto['descripcion'])) {
			if($gasto['igv'] != 0) {
				$this->gastos->add($gasto);
			} else {
				$this->flete->add($gasto['id'],$gasto['descripcion'], $gasto['cantidad'], ($gasto['precio'] * (1 + ($gasto['igv'] / 100))), $gasto['moneda'], $gasto['tdc'], $gasto['tdcDolar']);
			}
		}else {
			$this->gastos->add($gasto);
		}
	}
}