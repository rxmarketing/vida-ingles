<?php
 $desc_meta = strip_tags($lessonexcerpt);
 $desc_meta = str_replace('.','',$desc_meta);
 $desc_meta = str_replace(',','',$desc_meta);
 $desc_meta = str_replace('"','',$desc_meta);
 $desc_meta = str_replace(')','',$desc_meta);
 $desc_meta = str_replace('(','',$desc_meta);
 $desc_meta = str_replace(':','',$desc_meta);
 
 $keywords = $desc_meta;
 $keywords = str_replace(' ',',',$keywords);
 $keywords = str_replace(',o,',',',$keywords);
 $keywords = str_replace(',de,',',',$keywords);
 $keywords = str_replace(',que,',',',$keywords);
 $keywords = str_replace(',lo,',',',$keywords);
 $keywords = str_replace(',la,',',',$keywords);
 $keywords = str_replace(',los,',',',$keywords);
 $keywords = str_replace(',sus,',',',$keywords);
 $keywords = str_replace(',es,',',',$keywords);
 $keywords = str_replace(',/,',',',$keywords);
 $keywords = str_replace(',para,',',',$keywords);
 $keywords = str_replace(',el,',',',$keywords);
 $keywords = str_replace(',si,',',',$keywords);
 $keywords = str_replace(',hay,',',',$keywords);
 $keywords = str_replace(',u,',',',$keywords);
 $keywords = str_replace(',ya,',',',$keywords);
 $keywords = str_replace(',sea,',',',$keywords);
 $keywords = str_replace(',por,',',',$keywords);
 $keywords = str_replace(',por,',',',$keywords);
 $keywords = str_replace(',+,',',',$keywords);
 $keywords = str_replace(',pero,',',',$keywords);
 $keywords = str_replace(',otra,',',',$keywords);
 $keywords = str_replace(',y,',',',$keywords);
 $keywords = str_replace(',no,',',',$keywords);
 $keywords = str_replace(',en,',',',$keywords);
 $keywords = str_replace(',ha,',',',$keywords);
 $keywords = str_replace('El,','',$keywords);
 $keywords = str_replace('En,','',$keywords);
 $keywords = str_replace('Los,','',$keywords);
 $keywords = str_replace('La,','',$keywords);
 $keywords = str_replace('Le,','',$keywords);
 $keywords = str_replace('Las,','',$keywords);
 $keywords = str_replace('Se,','',$keywords);
 $keywords = str_replace('Para,','',$keywords);
 $keywords = str_replace(',se,',',',$keywords);
 $keywords = str_replace(',son,',',',$keywords);
 $keywords = str_replace(',una,',',',$keywords);
 $keywords = str_replace(',un,',',',$keywords);
 $keywords = str_replace(',desde,',',',$keywords);
 $keywords = str_replace(',para,',',',$keywords);
 $keywords=preg_replace('/,,+/', ',', $keywords);
 $keywords = str_replace(",",", ",$keywords);
?>