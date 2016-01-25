<?php
/* Copyright (C) 2011 FH Technikum-Wien
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as
 * published by the Free Software Foundation; either version 2 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307, USA.
 *
 * Authors: Andreas Oesterreicher 	<andreas.oesterreicher@technikum-wien.at>
 */
/**
 * Addon fuer Abstandhalter im Menuebaum
 */
require_once(dirname(__FILE__).'/menu_addon.class.php');

<<<<<<< HEAD
class menu_addon_spacer extends menu_addon
{
	public function __construct()
	{
		parent::__construct();
		
		$this->link=false;
		
		$this->block='
			<br /><br />
			';
		
		$this->output();
	}	
}

new menu_addon_spacer();
?>
=======
if(!class_exists('menu_addon_spacer'))
{
	class menu_addon_spacer extends menu_addon
	{
		public function __construct()
		{
			parent::__construct();
		
			$this->link=false;
		
			$this->block='
				<br /><br />
				';
		
			$this->output();
		}	
	}
}
new menu_addon_spacer();
?>
>>>>>>> fee287127566cd5d18c55b556d178b661711c694