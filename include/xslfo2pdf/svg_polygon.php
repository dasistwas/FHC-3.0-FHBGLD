<<<<<<< HEAD
<?PHP /*
xslfo2pdf
Copyright (C) 2005       Tegonal GmbH

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

Contact:
mike.toggweiler@tegonal.com
http://xslf2pdf.tegonal.com
*/ ?>
<?PHP
class SVG_Polygon extends SVG_StyleObject {

  public function process(DOMNode $node, $sargs="") {
    $this->initLocalAttribute($node, "points");
    
    $yOrig = $this->getContext("yOrig");
    $xOrig = $this->getContext("xOrig");
    
    $points = explode(" ", $this->getContext("points"));
    $pdf = $this->getPdf();
    $pointsArray = array();
    foreach($points as $point) {
      $coords = explode(",", $point);
      $pointsArray[] = $this->calcInternalValue($coords[0], "mm", "pt")+$xOrig;
      $pointsArray[] = $this->calcInternalValue($coords[1], "mm", "pt")+$yOrig;
    }
    $pdf->Polygon($pointsArray, $sargs);
  }
}
=======
<?PHP /*
xslfo2pdf
Copyright (C) 2005       Tegonal GmbH

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

Contact:
mike.toggweiler@tegonal.com
http://xslf2pdf.tegonal.com
*/ ?>
<?PHP
class SVG_Polygon extends SVG_StyleObject {

  public function process(DOMNode $node, $sargs="") {
    $this->initLocalAttribute($node, "points");
    
    $yOrig = $this->getContext("yOrig");
    $xOrig = $this->getContext("xOrig");
    
    $points = explode(" ", $this->getContext("points"));
    $pdf = $this->getPdf();
    $pointsArray = array();
    foreach($points as $point) {
      $coords = explode(",", $point);
      $pointsArray[] = $this->calcInternalValue($coords[0], "mm", "pt")+$xOrig;
      $pointsArray[] = $this->calcInternalValue($coords[1], "mm", "pt")+$yOrig;
    }
    $pdf->Polygon($pointsArray, $sargs);
  }
}
>>>>>>> fee287127566cd5d18c55b556d178b661711c694
?>