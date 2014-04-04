<?php 
// 2014 - Paige Thompson (paigeadele@gmail.com)
// run from a directory of .wav files, or flac or whatever (eg php ../generate_blabla.php > drumkit.xml) 
// copy directory of sound files and .xml file to ~/.hydrogen/data/drumkits
$kitname = getcwd();
echo "<drumkit_info><name>$kitname</name><info>generated with a php script</info><license>GPL</license><instrumentList>";

$index = 1;
if ($handle = opendir(getcwd())) {
	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != "..") {
			$name = explode(".", $entry);
			echo "<instrument>
				<id>$index</id>
				<name>$name[0]</name>
				<isMuted>false</isMuted>
				<isLocked>false</isLocked>
				<pan_L>1</pan_L>
				<pan_R>1</pan_R>
				<randomPitchFactor>0</randomPitchFactor>
				<gain>1</gain>
				<filterActive>false</filterActive>
				<filterCutoff>1</filterCutoff>
				<filterResonance>0</filterResonance>
				<Attack>0</Attack>
				<Decay>0</Decay>
				<Sustain>1</Sustain>
				<Release>1000</Release>
				<muteGroup>-1</muteGroup>
				<layer>
				<filename>$entry</filename>
				<min>0.67</min>
				<max>1.0</max>
				<gain>1</gain>
				<pitch>0</pitch>
				</layer>
				</instrument>\r\n";
			$index++; 
		}
	}
	closedir($handle);
}
echo "</instrumentList></drumkit_info>";
?>

