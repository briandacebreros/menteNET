<?php
	class Calendar_model extends CI_Model {

		var $conf;
		function Calendar_model() {
			
			$this->conf = array (
				'start_day' 		=> 'sunday',
				'show_next_prev' 	=> TRUE,
				'show_prev_url' 	=> base_url() . 'admin/calendario'
			);

			$this->conf['template'] = '
		        {table_open}<table class="calendario" border="0" cellpadding="10" cellspacing="0">{/table_open}

		        {heading_row_start}<tr>{/heading_row_start}

		        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
		        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
		        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

		        {heading_row_end}</tr>{/heading_row_end}

		        {week_row_start}<tr>{/week_row_start}
		        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
		        {week_row_end}</tr>{/week_row_end}

		        {cal_row_start}<tr>{/cal_row_start}
		        {cal_cell_start}<td>{/cal_cell_start}
		        {cal_cell_start_today}<td>{/cal_cell_start_today}
		        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

		        {cal_cell_content}
		        	<div class="day-number">{day}</div>
		        	<div class="content-calendar">{content}</div>
		        {/cal_cell_content}

		        {cal_cell_content_today}
		        	<div class="day-number hightlight">{day}</div>
		        	<div class="content-calendar">{content}</div>
		        {/cal_cell_content_today}

		        {cal_cell_no_content}
		        	<div class="day-number">{day}</div>
		        {/cal_cell_no_content}

		        {cal_cell_no_content_today}
		        	<div class="day-number hightlight">{day}</div>
		        {/cal_cell_no_content_today}

		        {cal_cell_blank}&nbsp;{/cal_cell_blank}

		        {cal_cell_other}{day}{/cal_cel_other}

		        {cal_cell_end}</td>{/cal_cell_end}
		        {cal_cell_end_today}</td>{/cal_cell_end_today}
		        {cal_cell_end_other}</td>{/cal_cell_end_other}
		        {cal_row_end}</tr>{/cal_row_end}

		        {table_close}</table>{/table_close}
			';
		}


		function generate($year, $month) {
			
			//$conf['template'] = calendar_design();
			$data = $this->get_fechas_citas($year, $month);

			$this->load->library('calendar', $this->conf);
			return $this->calendar->generate($year, $month, $data);

		}
		function get_fechas_citas($year, $month) {
			$temp_month = strlen($month);
			if ( (int)$temp_month == 1) {
				$month = '0' . $month;
			}
			$query = $this->db->select('fecha, usuarioID')->from('cita')
				->like('fecha',$year . '-' . $month,'after')->get();
			$data = array();
			foreach( $query->result() as $row ) {
				$data[substr($row->fecha,8,2)] = $row->usuarioID;
			}
			return $data;
		}

		function calendar_design() {
			$design_calendar = '
		        {table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}

		        {heading_row_start}<tr>{/heading_row_start}

		        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
		        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
		        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

		        {heading_row_end}</tr>{/heading_row_end}

		        {week_row_start}<tr>{/week_row_start}
		        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
		        {week_row_end}</tr>{/week_row_end}

		        {cal_row_start}<tr>{/cal_row_start}
		        {cal_cell_start}<td>{/cal_cell_start}
		        {cal_cell_start_today}<td>{/cal_cell_start_today}
		        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

		        {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
		        {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

		        {cal_cell_no_content}{day}{/cal_cell_no_content}
		        {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

		        {cal_cell_blank}&nbsp;{/cal_cell_blank}

		        {cal_cell_other}{day}{/cal_cel_other}

		        {cal_cell_end}</td>{/cal_cell_end}
		        {cal_cell_end_today}</td>{/cal_cell_end_today}
		        {cal_cell_end_other}</td>{/cal_cell_end_other}
		        {cal_row_end}</tr>{/cal_row_end}

		        {table_close}</table>{/table_close}
			';

			return $design_calendar;
		}
	
}