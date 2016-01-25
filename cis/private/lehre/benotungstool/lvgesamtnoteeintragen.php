<?php
/* Copyright (C) 2006 Technikum-Wien
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
 * Authors: Christian Paminger <christian.paminger@technikum-wien.at>,
 *          Andreas Oesterreicher <andreas.oesterreicher@technikum-wien.at> and
 *          Rudolf Hangl <rudolf.hangl@technikum-wien.at>.
 */

require_once('../../../../config/cis.config.inc.php');
<<<<<<< HEAD
require_once('../../../../include/basis_db.class.php');			
=======
require_once('../../../../include/basis_db.class.php');
>>>>>>> fee287127566cd5d18c55b556d178b661711c694
require_once('../../../../include/functions.inc.php');
require_once('../../../../include/lehrveranstaltung.class.php');
require_once('../../../../include/studiengang.class.php');
require_once('../../../../include/studiensemester.class.php');
require_once('../../../../include/lehreinheit.class.php');
require_once('../../../../include/benutzerberechtigung.class.php');
require_once('../../../../include/uebung.class.php');
require_once('../../../../include/beispiel.class.php');
require_once('../../../../include/studentnote.class.php');
require_once('../../../../include/datum.class.php');
require_once('../../../../include/legesamtnote.class.php');
require_once('../../../../include/lvgesamtnote.class.php');
require_once('../../../../include/zeugnisnote.class.php');
require_once('../../../../include/person.class.php');
require_once('../../../../include/benutzer.class.php');
require_once('../../../../include/student.class.php');
require_once('../../../../include/phrasen.class.php');
require_once('../../../../include/zeugnisnote.class.php');
<<<<<<< HEAD

if (!$db = new basis_db())
	die($p->t('global/fehlerBeimOeffnenDerDatenbankverbindung'));
		
=======
require_once('../../../../include/notenschluessel.class.php');
require_once('../../../../include/note.class.php');

if (!$db = new basis_db())
	die($p->t('global/fehlerBeimOeffnenDerDatenbankverbindung'));

>>>>>>> fee287127566cd5d18c55b556d178b661711c694
$user = get_uid();

$sprache = getSprache();
$p = new phrasen($sprache);

if(!check_lektor($user))
	die($p->t('global/keineBerechtigungFuerDieseSeite'));

$rechte = new benutzerberechtigung();
$rechte->getBerechtigungen($user);

if(isset($_GET['lvid']) && is_numeric($_GET['lvid'])) //Lehrveranstaltung_id
	$lvid = $_GET['lvid'];
else
	die($p->t('global/fehlerBeiDerParameteruebergabe'));

//Laden der Lehrveranstaltung
$lv_obj = new lehrveranstaltung();
if(!$lv_obj->load($lvid))
	die($lv_obj->errormsg);

//Studiengang laden
$stg_obj = new studiengang($lv_obj->studiengang_kz);

if(isset($_GET['stsem']))
	$stsem = $_GET['stsem'];
else
	$stsem = '';

//Vars
$datum_obj = new datum();
$response='';
$uebung_id = (isset($_GET['uebung_id'])?$_GET['uebung_id']:'');
$uid = (isset($_GET['uid'])?$_GET['uid']:'');

<<<<<<< HEAD
//Kopfzeile

=======
$noten_anmerkung=array();
$note_obj = new note();
$note_obj->getAll();
foreach($note_obj->result as $row)
	$noten_anmerkung[$row->anmerkung]=$row->note;
>>>>>>> fee287127566cd5d18c55b556d178b661711c694

//Studiensemester laden
$stsem_obj = new studiensemester();
if($stsem=='')
	$stsem = $stsem_obj->getaktorNext();

//$note = $_REQUEST["note"];

if(!$rechte->isBerechtigt('admin',0) &&
   !$rechte->isBerechtigt('admin',$lv_obj->studiengang_kz) &&
   !$rechte->isBerechtigt('lehre',$lv_obj->studiengang_kz))
{
	$qry = "SELECT lehreinheit_id FROM lehre.tbl_lehrveranstaltung JOIN lehre.tbl_lehreinheit USING(lehrveranstaltung_id)
<<<<<<< HEAD
			JOIN lehre.tbl_lehreinheitmitarbeiter USING(lehreinheit_id) 
=======
			JOIN lehre.tbl_lehreinheitmitarbeiter USING(lehreinheit_id)
>>>>>>> fee287127566cd5d18c55b556d178b661711c694
			WHERE tbl_lehrveranstaltung.lehrveranstaltung_id=".$db->db_add_param($lvid, FHC_INTEGER)." AND
			tbl_lehreinheit.studiensemester_kurzbz=".$db->db_add_param($stsem)." AND tbl_lehreinheitmitarbeiter.mitarbeiter_uid=".$db->db_add_param($user);
	if($result = $db->db_query($qry))
	{
		if($db->db_num_rows($result)==0)
			die($p->t('global/keineBerechtigungFuerDieseSeite'));
	}
<<<<<<< HEAD
	else 
=======
	else
>>>>>>> fee287127566cd5d18c55b556d178b661711c694
	{
		die('Fehler beim Pruefen der Rechte');
	}
}

<<<<<<< HEAD
function savenote($db,$lvid, $student_uid, $note)
{
	global $stsem, $user, $p;
=======
function savenote($db,$lvid, $student_uid, $note, $punkte=null)
{
	global $stsem, $user, $p, $noten_anmerkung;
>>>>>>> fee287127566cd5d18c55b556d178b661711c694
	$jetzt = date("Y-m-d H:i:s");
	//Ermitteln ob der Student diesem Kurs zugeteilt ist
	$qry = "SELECT 1 FROM campus.vw_student_lehrveranstaltung WHERE uid=".$db->db_add_param($student_uid)." AND lehrveranstaltung_id=".$db->db_add_param($lvid, FHC_INTEGER);
	if($result = $db->db_query($qry))
<<<<<<< HEAD
=======
	{
>>>>>>> fee287127566cd5d18c55b556d178b661711c694
		if($db->db_num_rows($result)==0)
		{
			$student = new student();
			$student->load($student_uid);
			return $p->t('benotungstool/studentIstLvNichtZugeordnet', array($student->nachname, $student->vorname, trim($student->matrikelnr)))."\n";
		}
<<<<<<< HEAD
	
=======
	}

	// Wenn punkte vorhanden sind, dann die note dazu ermitteln
	if($punkte!='' && $note=='')
	{
		if(is_numeric($punkte))
		{
			$notenschluessel = new notenschluessel();
			$note = $notenschluessel->getNote($punkte, $lvid, $stsem);
		}
		else
		{
			// Wenn Punkte nicht numerisch ist, dann kann es eine der Spezailnoten sein (ar, met, ...)
			$note = $punkte;
			$punkte='';
		}
	}

	if(!is_numeric($note))
	{
		// Wenn die Note keine Nummer ist wird anhand der Anmerkung gesucht ob eine passende Note gefunden
		// wird damit hier die Noten nb, met, etc auch importiert werden koennen
		if(isset($noten_anmerkung[$note]))
			$note = $noten_anmerkung[$note];
	}

>>>>>>> fee287127566cd5d18c55b556d178b661711c694
	$lvgesamtnote = new lvgesamtnote();
    if (!$lvgesamtnote->load($lvid, $student_uid, $stsem))
    {
		$lvgesamtnote->student_uid = $student_uid;
		$lvgesamtnote->lehrveranstaltung_id = $lvid;
		$lvgesamtnote->studiensemester_kurzbz = $stsem;
		$lvgesamtnote->note = trim($note);
		$lvgesamtnote->mitarbeiter_uid = $user;
		$lvgesamtnote->benotungsdatum = $jetzt;
		$lvgesamtnote->freigabedatum = null;
		$lvgesamtnote->freigabevon_uid = null;
		$lvgesamtnote->bemerkung = null;
		$lvgesamtnote->updateamum = null;
		$lvgesamtnote->updatevon = null;
		$lvgesamtnote->insertamum = $jetzt;
		$lvgesamtnote->insertvon = $user;
<<<<<<< HEAD
=======
		$lvgesamtnote->punkte = $punkte;
>>>>>>> fee287127566cd5d18c55b556d178b661711c694
		$new = true;
		$response = "neu";
    }
    else
    {
		$lvgesamtnote->note = trim($note);
<<<<<<< HEAD
=======
		$lvgesamtnote->punkte = $punkte;
>>>>>>> fee287127566cd5d18c55b556d178b661711c694
		$lvgesamtnote->benotungsdatum = $jetzt;
		$lvgesamtnote->updateamum = $jetzt;
		$lvgesamtnote->updatevon = $user;
		$new = false;
<<<<<<< HEAD
		if ($lvgesamtnote->freigabedatum)		
=======
		if ($lvgesamtnote->freigabedatum)
>>>>>>> fee287127566cd5d18c55b556d178b661711c694
			$response = "update_f";
		else
			$response = "update";
	}
	if (!$lvgesamtnote->save($new))
<<<<<<< HEAD
		return "<span class='error'>".$lvgesamtnote->errormsg."</span>";
	else 
=======
		return $lvgesamtnote->errormsg;
	else
>>>>>>> fee287127566cd5d18c55b556d178b661711c694
		return $response;
}

// lvgesamtnote für studenten speichern
if (isset($_REQUEST["submit"]))
{
	$lvid = $_REQUEST["lvid"];
	if(isset($_REQUEST["student_uid"]) && $_REQUEST["student_uid"] != '')
	{
		$student_uid = $_REQUEST["student_uid"];
		$note = $_REQUEST["note"];
<<<<<<< HEAD
		
		//if((($note>0) && ($note < 6)) || ($note == 7) || ($note==16) || ($note==10) || ($note==14))
			$response = savenote($db,$lvid, $student_uid, $note);
		/*else
			$response = $p->t('benotungstool/noteEingeben')."!";
		*/
=======
		$punkte = (isset($_REQUEST["punkte"])?$_REQUEST["punkte"]:'');

		$response = savenote($db,$lvid, $student_uid, $note, $punkte);
>>>>>>> fee287127566cd5d18c55b556d178b661711c694
		echo $response;
	}
	else
	{
<<<<<<< HEAD
=======

>>>>>>> fee287127566cd5d18c55b556d178b661711c694
		foreach ($_POST as $row=>$val)
		{
			if(mb_strstr(mb_strtolower($row), 'matrikelnr_'))
			{
				$id=mb_substr($row, mb_strlen('matrikelnr_'));
<<<<<<< HEAD
				if(isset($_POST['matrikelnr_'.$id]) && isset($_POST['note_'.$id]))
				{
					$matrikelnummer = $_POST['matrikelnr_'.$id];
					$note = $_POST['note_'.$id];
					
=======
				if(isset($_POST['matrikelnr_'.$id]) && (isset($_POST['note_'.$id]) || isset($_POST['punkte_'.$id])))
				{
					$matrikelnummer = $_POST['matrikelnr_'.$id];
					$note=null;
					$punkte=null;
					if(isset($_POST['note_'.$id]))
						$note = $_POST['note_'.$id];
					elseif(isset($_POST['punkte_'.$id]))
						$punkte = $_POST['punkte_'.$id];
					else
					{
						$response.="\nNote oder Punkte fehlen";
						continue;
					}
					$punkte=str_replace(',','.', $punkte);
>>>>>>> fee287127566cd5d18c55b556d178b661711c694
					//UID ermitteln
					$student = new student();
					if(!$student_uid = $student->getUidFromMatrikelnummer($matrikelnummer))
					{
						$response.="\n".$p->t('benotungstool/studentMitMatrikelnummerExistiertNicht',array($matrikelnummer));
						continue;
					}
<<<<<<< HEAD
					
					// Hole Zeugnisnote wenn schon eine eingetragen ist
					if ($zeugnisnote = new zeugnisnote($lvid, $student_uid, $stsem))
						$znote = $zeugnisnote->note;
					else
						$znote = null;	
					
					/*if(((($note>0) && ($note < 6)) || ($note == 7) || ($note==16) || ($note==10) || ($note==14)))
					{*/
						$val=savenote($db,$lvid, $student_uid, $note);
						if($val!='neu' && $val!='update' && $val!='update_f')
							$response.=$val;
					/*}
					else
					{
						// Wenn Zeugnisnote schon 6 ist -> keine Fehlermeldung mehr
						if($znote != 6)
						{	
							$student->load($student_uid);						
							$response .= "\n".$p->t('benotungstool/fehlerhafteNoteBeiStudent', array($student->vorname, $student->nachname))." ".$p->t('benotungstool/noteEingeben');
						}
					}*/
				}
				else 
				{
					$response.="\n".$p->t('global/fehlerBeiDerParameteruebergabe');					
=======

					// Hole Zeugnisnote wenn schon eine eingetragen ist
					/*
					if ($zeugnisnote = new zeugnisnote($lvid, $student_uid, $stsem))
						$znote = $zeugnisnote->note;
					else
						$znote = null;
					*/
					$val=savenote($db,$lvid, $student_uid, $note, $punkte);
					if($val!='neu' && $val!='update' && $val!='update_f')
						$response.=$val;
				}
				else
				{
					$response.="\n".$p->t('global/fehlerBeiDerParameteruebergabe');
>>>>>>> fee287127566cd5d18c55b556d178b661711c694
				}
			}
		}
		echo $response;
<<<<<<< HEAD
	}	
=======
	}
>>>>>>> fee287127566cd5d18c55b556d178b661711c694
}
?>