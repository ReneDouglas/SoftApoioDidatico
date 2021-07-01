<?php
	/**
	* classe TCalendar
	* classe para construção de calendário
	*/
	class TCalendar extends TTable {
		
		private $startDay = 0; //primeiro dia da semana
		private $startMonth = 1;
		
		private $dayNames = array("dom", "seg", "ter", "qua", "qui", "sex", "sáb");
		
		private $monthNames = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
								"Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
		
		private $daysInMonth = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
		
		private $actionMonth; // ação definida para passar os meses
		private $actionToAll; // ação que será definida a todos os dias do mês
		private $date; // armazena as datas que terão a actionDay
		
		private $actionToday;
		
		public function __construct(){
			parent::__construct();
			
			$this->class = 'calendar';
		}
		
		public function addCalendarLink(TAction $action){
			$this->actionMonth = $action;
		}
		
		public function addDataLinkToAll(TAction $action){
			$this->actionToAll = $action;
		}
		
		public function addDates($date){
			$this->date = $date;
		}
		public function addActionToday(TAction $action){
			$this->actionToday = $action;
		}
		/*
		* Retorna o link passando como parâmetros o mês e o ano
		*/
		private function getCalendarLink($month, $year){
			if($this->actionMonth) {
				$this->actionMonth->setParameter('mes',$month);
				$this->actionMonth->setParameter('ano',$year);
				return $this->actionMonth->serialize();
			}else {
				return "";
			}			
		}
		private function getDateLink($day, $month, $year){
			
			$span = new TElement('span');
			$span->add("{$day}");
						
			$link = new TElement('a');
			$link->add($span);
			
			$class="";
			
			$strDia = ($day<=9) ? "0{$day}" : "{$day}" ;
			$strMes = ($month<=9) ? "0{$month}" : "{$month}";
			$strAno = "{$year}";
			
			$date = mktime(0, 0, 0, $month, $day, $year);
			if($this->date){
				foreach($this->date as $time){
					if(($date == strtotime($time))){
						$class = $date==strtotime('today')? 'day preenchido today': 'day preenchido';
						$span->class = $class;
					}
				}
			}
			if($this->actionToAll && ($date<=strtotime('now'))){
				$this->actionToAll->setParameter("date","{$strDia}/{$strMes}/{$strAno}");
				$link->href  = $this->actionToAll->serialize();
				if(!$class){
					$class = $date==strtotime('today')? 'day falta today': 'day falta';
					$span->class = $class;
				}
				return $link;
			} else {
				if(!$class){
					$class = 'day';
					$span->class = $class;
				}
				return $span;
			}
		}
		private function getLinkToday(){
			if($this->actionToday) {
				return $this->actionToday->serialize();
			}else {
				return "";
			}
		}
		/*
        Retorna o model o mês corrente
		*/
		function getCurrentMonth()
		{
			$d = getdate(time());
			return $this->createModel($d["mon"], $d["year"]);
		}
		//valida o mês e o ano
		private function adjustDate($month, $year)
		{
			$a = array();  
			$a[0] = $month;
			$a[1] = $year;
			
			while ($a[0] > 12)
			{
				$a[0] -= 12;
				$a[1]++;
			}
			
			while ($a[0] <= 0)
			{
				$a[0] += 12;
				$a[1]--;
			}
			
			return $a;
		}
		
		private function getDaysInMonth($month, $year)
		{
			if ($month < 1 || $month > 12)
			{
				return 0;
			}
	   
			$d = $this->daysInMonth[$month - 1];
	   
			if ($month == 2)
			{
				if ($year%4 == 0)
				{
					if ($year%100 == 0)
					{
						if ($year%400 == 0)
						{
							$d = 29;
						}
					}
					else
					{
						$d = 29;
					}
				}
			}
		
			return $d;
		}
		
		public function createModel($m, $y, $showYear = 1) {
			
			$a = $this->adjustDate($m, $y);
			$month = $a[0];
			$year = $a[1];        
			
			$daysInMonth = $this->getDaysInMonth($month, $year);
			//$first recebe o dia da semana em que o mês começa
			$date = getdate(mktime(12, 0, 0, $month, 1, $year));
			$first = $date["wday"];
			$monthName = $this->monthNames[$month - 1];
			
			$prev = $this->adjustDate($month - 1, $year);
			$next = $this->adjustDate($month + 1, $year);
			
			if ($showYear == 1)
			{
				$prevMonth = $this->getCalendarLink($prev[0], $prev[1]);
				$nextMonth = $this->getCalendarLink($next[0], $next[1]);
			}
			else
			{
				$prevMonth = "";
				$nextMonth = "";
			}
			
			if($prevMonth == "" or $nextMonth == ""){
				$prevMonth = "&nbsp;";
				$nextMonth = "&nbsp;";
			} else {
				
				$botao = new TBotao('&lt;&lt;',$prevMonth,'navButton prevMonth');
				$prevMonth = $botao;
				
				$botao = new TBotao('&gt;&gt;',$nextMonth,'navButton nextMonth');
				$nextMonth = $botao;
			}
			
			$hoje = new TBotao('Hoje',$this->getLinkToday());
			
			//cria o cabeçalho do calendário
			$header = $monthName . (($showYear > 0) ? " de " . $year : "");
			
			$row = parent::addRow();
			$cell = $row->addCell($hoje,true);
			$cell->colspan = 2;
			$cell->class = 'nomeMes';
			
			$cell = $row->addCell($header,true);
			$cell->colspan = 3;
			$cell->class = 'nomeMes';
			
			$cell = $row->addCell($prevMonth,true);
			$cell->add($nextMonth);
			$cell->colspan = 2;
			$cell->class = 'nomeMes';
			
			//adciona o nome dos dias da semana
			$row = parent::addRow();
			for($i = 0; $i < sizeof($this->dayNames); $i++){
				$row->addCell($this->dayNames[($this->startDay + $i)%7],true);
			}
			//organiza o nome dos dias da semana no calendário
			$d = $this->startDay + 1 - $first;
			while ($d > 1)
			{
				$d -= 7;
			}
	
			while ($d <= $daysInMonth)
			{
				$row = parent::addRow();
				
				for ($i = 0; $i < 7; $i++)
				{
					if ($d > 0 && $d <= $daysInMonth)
					{
						$row->addCell($this->getDateLink($d,$month,$year));
					}
					else
					{
						$row->addCell("&nbsp;");
					}
					$d++;
				}
			}
		}
	}
?>