 <?php
// create new empty worksheet and set default font
$this->PhpExcel->createWorksheet()->setDefaultFont('Calibri', 12);
//Merge some cells
$this->PhpExcel->getActiveSheet()->mergeCells('A1:G1');
//Change alignment
$this->PhpExcel->getActiveSheet()->getStyle('A1')->getAlignment()
->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//chanfe background color
$this->PhpExcel->getActiveSheet()->getStyle('A1:G1')->applyFromArray(
        array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '0B5394'),
            )
        )
    )
    ->getFont()->setBold(true)->getColor()->setRGB('FFFFFF');
//Change alignment		
$this->PhpExcel->getActiveSheet()->getStyle('A2:G2')->getAlignment()
->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//chanfe background color
	$this->PhpExcel->getActiveSheet()->getStyle('A2:G2')->applyFromArray(
        array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '0B5394')
            )
        )
    )
    ->getFont()->setBold(true)->getColor()->setRGB('FFFFFF');
	//set auto size
	 $this->PhpExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	 $this->PhpExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	 $this->PhpExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	 $this->PhpExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	 $this->PhpExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	 $this->PhpExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
	 $this->PhpExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
//define title
$title = array(
    array('label' => __('Bitacora de Cambios Banco Estado')));
	// define table cells
$table = array(
    array('label' => __('Fecha'), 'filter' => true),
    array('label' => __('Plataforma'), 'filter' => true),
    array('label' => __('Tema')),
    array('label' => __('Descripcion'), 'width' => 50, 'wrap' => true),
    array('label' => __('Usuario')),
    array('label' => __('Estado')),
    array('label' => __('Tipo'))
);

// add heading with different font and bold text
$this->PhpExcel->addTableHeader($title, array('name' => 'Cambria', 'bold' => true));
$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

// add data
$fecha = new DateTime();
foreach ($actividades as $d) {
	$nameUser = $this->requestAction('/Activities/nameUser/' . $d['Activity']['activity_user']);
		$namePlatform = $this->requestAction('/Activities/namePlatform/' . $d['Activity']['activity_platform']);
		$nameType = $this->requestAction('/Activities/nameType/' . $d['Activity']['activity_type']);
    $this->PhpExcel->addTableRow(array(
        $d['Activity']['activity_update'],
        $namePlatform,
        $d['Activity']['activity_tema'],
        //strip_tags($d['Activity']['activity_description']),
        strip_tags(html_entity_decode($d['Activity']['activity_description'], ENT_COMPAT, 'UTF-8')),
	    $nameUser,
        $d['Activity']['activity_state']."%",
        $nameType
    ));
}
//save on server
$this->PhpExcel->save($file);
$name= str_replace(WWW_ROOT, "", $file);
//send email
//$this->requestAction('/Activities/email/');
// close table and output
$this->PhpExcel->addTableFooter()->output($name);
?>