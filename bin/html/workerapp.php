<?php

$action = $_GET['action'];
$id 	= $_GET['id'];
$url 	= $_GET['url'];

if ($action == "goto_hell") {
	echo "If the window does not close automatically you may close it now";
	echo "<script>top.window.close();</script>";
	
	exit;
}

include_once "../functions.inc.php";
include_once "../config.inc.php";

// Ajax Methods
//--- Builder page ajax actions
if ($action == "builderSerieValues") {
    echo builderGetSerieValues($_GET['vendor']);
    exit;
}
if ($action == "builderModelValues") {
    echo builderGetModelValues($_GET['vendor'], $_GET['serie']);
    exit;
}
//---


// Non Ajax methods below
include_once "header.inc.php";

?><script> 
    //Reference to the edp javascript core
    var edp = top.edp;
</script><?

if ($action == "") {
    echo "No action defined..";
    exit;
}


if ($action == "browseURL") {
	echoPageItemTOP("icons/big/globe.png", "Browsing remote url...");
	echo "<div class='pageitem_bottom'>\n";	
	echo "<ul class='pageitem'>\n";
	echo "<li class='textbox'>\n";
	echo "<iframe id=\"browser\" marginwidth=\"0\" marginheight=\"0\" border=\"0\" frameborder=\"0\" height=\"600px\" width=\"100%\" src=\"$url\"></iframe>\n";			
	echo "</li>\n";
	echo "</ul>\n";	
}
if ($action == "showCredits") {
	//Fetch data for ID
	$stmt = $edp_db->query("SELECT * FROM credits where id = '$id'");
	$stmt->execute();
	$bigrow = $stmt->fetchAll(); $row = $bigrow[0];

	echoPageItemTOP("icons/big/$row[icon]", "$row[name]");
	echo "<div class='pageitem_bottom'>\n";
	echo "<br>";
	echo "<span class='graytitle'>Info</span><br>";
	echo "<ul class='pageitem'>\n";
	echo "<li class='textbox'>\n";
	echo "<p><b>Name:</b> $row[name]</p>\n";
	echo "<p><b>Type:</b> $row[type]</p>\n";	
	echo "<p><b>Creator:</b> $row[owner]</p>\n";
	echo "<p><b>E-mail:</b> $row[contactemail]</p><br>\n";
	echo "<p><b>Website:</b><a href=\"$row[inforurl]\"> Click here to Visit</a></p>\n";
	$url = $row[donationurl];
	//echo "<p><b>Donate to support:</b> <input type='button' value='Donate' onclick='edp.openlink(\"$url\");'> ($url)</p>\n";
	echo "<p><b>Donate to support:</b><a href=\"$row[donationurl]\"> Click here to Donate</a></p>\n";			
	echo "</li>\n";
	echo "</ul>\n";
	echo "<br>";	
	echo "<span class='graytitle'>About $row[name]</span><br>";
	echo "<ul class='pageitem'>\n";
	echo "<li class='textbox'>\n";
	echo "<p>$row[description]</p>\n";
	echo "</li>\n";
	echo "</ul>\n";
	
	
	exit;	
}






if ($action == "dellBiosCrack") {
    global $workpath;
    system_call("open $workpath/bin/DELLBiosPWgen");
    exit;
}

if ($action == "dellBiosCrack") {
    runDellBiosCrack();
    exit;
}
if ($action == "install-mc") {
    echo "<pre>";
    downloadAndRun("http://www.osxlatitude.com/files/mc.dmg", "dmg", "mc.dmg", "/Volumes/mc.pkg/mc.pkg");
    exit;
}
if ($action == "install-htop") {
    echo "<pre>";
    downloadAndRun("http://www.osxlatitude.com/files/htop.pkg", "pkg", "htop.pkg", "/downloads/htop.pkg");
    exit;
}
if ($action == "install-lynx") {
    echo "<pre>";
    downloadAndRun("http://www.osxlatitude.com/files/lynx.dmg", "dmg", "lynx.dmg", "/Volumes/Lynx-2.8.7d9-10.5.1+u/install.command");
    exit;
}
if ($action == "install-istat2") {
    echo "<pre>";
    downloadAndRun("http://www.osxlatitude.com/files/istat2.dmg", "dmg", "istat2.dmg", "/Volumes/istat2/install.app");
    exit;
}

if ($action == "fix-touch-sle") {
    echo "<pre>";
    fixes_touch_sle();
    exit;
}
if ($action == "toogle-hibernation") {
    echo "<pre>";
    fixes_toogleHibernationMode();
    exit;
}
if ($action == "console-slow-start") {
    echo "<pre>";
    system_call("sudo rm -rf /private/var/log/asl/*.asl");
    echo "Fix applied.. <br>";
    exit;
}
if ($action == "fix-sound-delay") {
    echo "<pre>";
    fixes_soundelay();
    exit;
}

if ($action == "fix-biometric") {
    echo "<pre>";
    system_call("mkdir /downloads; cd /downloads; curl -O http://www.osxlatitude.com/files/ProtectorSuite.dmg");
    system_call("hdiutil attach /downloads/ProtectorSuite.dmg");
    system_call("open \"/Volumes/Protector Suite/ProtectorSuite.pkg\"");
    echo "<br>Installer launched...";
    exit;
}
if ($action == "fix-sound-delay") {
    echo "<pre>";
    system_call("mkdir /downloads; cd /downloads; curl -O http://www.osxlatitude.com/files/Soundflower.dmg");
    system_call("hdiutil attach /downloads/Soundflower.dmg");
    system_call("open /Volumes/Soundflower-1.5.2/Soundflower.pkg");
    echo "<br>Installer launched...";
    exit;
}
if ($action == "fix-console-colors") {
    echo "<pre>";
    system_call("echo export CLICOLOR=1 >>~/.bash_profile");
    system_call("echo export LSCOLORS=ExFxCxDxBxegedabagacad >>~/.bash_profile");
    echo "Fix applied..";
    exit;
}
if ($action == "fix-reset-display") {
    echo "<pre>";
    fixes_reset_display();
    exit;
}
if ($action == "fix-airdrop") {
    echo "<pre>";
    global $workpath;
    system_call("open $workpath/storage/apps/ShowAirDrop.app");
    echo "App launched.. <br>";
    exit;
}

if ($action == "fix-spdisplays") {
    echo "<pre>";
    system_call("$workpath/bin/fixes/Color-LCD-fix.sh");
    exit;
}

if ($action == "fix-icloud-recoveryhd") {
    echo "<pre>";
    fixes_icloud_recoveryhd();
    exit;
}

if ($action == "fix-icloud-nvram") {
    echo "<pre>";
    fixes_icloud_nvram();
    exit;
}

if ($action == "toggle-hidpi") {
    echo "<pre>";
    fixes_toggle_hidpi();
    exit;
}

if ($action == "update-edp") 	{ echo "<pre>"; global $edpmode; $edpmode = "web"; $edp->update(); echo "<script> window.fluid.dockBadge = ''; </script> \n"; exit; }
if ($action == "close-edpweb") 	{ echo "<pre>"; close - edpweb(); exit; }
if ($action == "changelog") 	{ showChangelog(); exit; }
if ($action == "showBuildLog")	{ showBuildLog(); exit ; }
if ($action == "showLoadingLog")	{ showLoadingLog(); exit ; }


//Functions called by this script

function showChangelog() {
	echoPageItemTOP("icons/big/xcode.png", "Changelog for EDP...");
    echo "<div class='pageitem_bottom'>\n";
    
    $url = "http://pipes.yahoo.com/pipes/pipe.run?_id=fcf8f5975800dd5f04a86cdcdcef7c4d&_render=rss";
    $xml = new SimpleXmlElement(file_get_contents($url));

    foreach ($xml->channel->item as $item) {
        echo '<ul class="pageitem"><li class="textbox">';
        echo '<span class="header">' . $item->title . '</span>';
        echo '<p>' . trim($item->description) . '</p><br/>';
        echo '<p>Commited on: ' . date('l jS \of F Y h:i:s A', strtotime($item->pubDate)) . '</p></li></ul>';
    }
    
    echo "</div>\n";
}


function fixes_touch_sle() {
    global $slepath;
    echo "<br><br>Touching $slepath... <br><br>Notice: This might trigger a kernelcache rebuild...<br><br>";
    system_call("touch $slepath");
}
function fixes_toogleHibernationMode() {
    global $hibernatemode;
    
    if ($hibernatemode == "3") {
        echo "Disabling hibernation... <br>";
        system_call("pmset -a hibernatemode 0");
        if (is_file("/var/vm/sleepimage")) {
            echo "Hibernation file was found... removing.. <br>";
            system("rm -Rf /var/vm/sleepimage");
        }
        echo "Fix applied..<br>";
    }
    
    if ($hibernatemode == "0") {
        echo "Enabling hibernation... <br>";
        system_call("pmset -a hibernatemode 3");
        echo "Fix applied..<br>";
    }
}


function fixes_icloud_recoveryhd() {
    system_call("$workpath/bin/fixes/icloud-recoveryhd.sh");
}	
	
function fixes_icloud_nvram() {
    system_call("$workpath/bin/fixes/icloud-nvram.sh");
}	
	
	
function fixes_toggle_hidpi() {
    echo "Enabling HiDPI mode in Mountain Lion.<br><br>";
    system_call("sudo defaults write /Library/Preferences/com.apple.windowserver DisplayResolutionEnabled -bool YES");
    system_call("sudo defaults delete /Library/Preferences/com.apple.windowserver DisplayResolutionDisabled");
    echo "<br>HiDPI mode enabled! Please logout and back in for this to take effect..<br>";
    echo "Go to [Apple menu --> System Preferences --> Displays --> Display --> Scaled] after logging back in.<br>";
    echo "You will see a bunch of 'HiDPI' resolutions in the list to choose from.";
}	
function fixes_reset_display() {
    system_call("rm -f /Library/Preferences/com.apple.window*");
    system_call("rm -f ~/Library/Preferences/ByHost/com.apple.window*");
    system_call("rm -f ~/Library/Preferences/ByHost/com.apple.pref*");
    echo "Fix applied..<br>";
    echo "Connect your screen again to use it in extended mode after a reboot..<br>";
}

function showBuildLog() {
	global $workpath, $edp, $ee;
	echoPageItemTOP("icons/big/logs.png", "System configuration build log");
	echo "<body onload=\"JavaScript:timedRefresh(5000);\">";	

	echo "<div class='pageitem_bottom'\">";	
	/*echo "<img src=\"icons/big/loading.gif\" style=\"width:300px;height:30px;position:relative;left:50%;top:50%;margin:15px 0 0 -135px;\">";
	//echo "<table width=\"100%\" border=\"0\" height=\"100%\" align=\"CENTER\"></table>\n";
	//echo "<tr><td align=\"CENTER\"><td>Files are being downloaded... Please wait......</td><img src=\"icons/big/loading.gif\" ></td></tr></table>\n";
	echo "<b><center>Please wait for few minutes while we download the files needed for your model (will take approx 5 - 15 minutes depending on your internet speed) and it will start building after the download................</center></b><br>";*/
	
	echo "<b>Build process:</b><br>";
	
	if(is_file("$workpath/build.log"))
		include "$workpath/build.log";
		
	if(is_file("$workpath/myFix.log"))
		include "$workpath/myFix.log";
		
	if(is_file("$workpath/myFix2.log"))
		include "$workpath/myFix2.log";
	
	if(is_dir("$workpath/kpsvn/dload/statFiles")) {
		$fcount = shell_exec("cd $workpath/kpsvn/dload/statFiles; ls | wc -l");
	}
	if ($fcount > 0)
		echo "<b>Files left to download/update : $fcount</b><br>";
		
	if ($fcount == 0 && !is_file("$workpath/myFix.log"))
	{
		
		$edp->writeToLog("$workpath/build.log", "<br><b>All Files downloaded/updated.</b><br>");
		
		//
		// Step 5 : Copying custom files from /Extra/include
		//
		$edp->writeToLog("$workpath/build.log", "<br><b>Step 5) Copying custom files from /Extra/include:</b><br>");
		copyCustomFiles();
		
		//
		// Step 6 : Applying last minute fixes and generating caches
		//
		$edp->writeToLog("$workpath/myFix.log", "<br><b>Step 6) Applying last minute fixes and Calling myFix to copy kexts & generate kernelcache:</b><br>");
		
		// Final Chown to SLE and touch (this is due to some issuses with myFix in Mavericks)
		system_call("sudo chown -R root:wheel /System/Library/Extensions/");
		system_call("sudo touch /System/Library/Extensions/");
		$edp->writeToLog("$workpath/myFix.log", "Clearing boot-args in NVRAM...<br>");
		system_call("nvram -d boot-args");
		$edp->writeToLog("$workpath/myFix.log", "Removing version control of kexts in $ee<br>");
   		system_call("rm -Rf `find -f path \"$ee\" -type d -name .svn`");
   		
   		//$edp->writeToLog("$workpath/kpsvn/dload/myFix.sh", "sudo myfix -q -t / >> $workpath/myFix.log &");
		$edp->writeToLog("$workpath/myFix.log", "<a name='myfix'></a>");
		$edp->writeToLog("$workpath/myFix.log", "Running myFix to fix permissions and genrate cache...<br><br>");
		$edp->writeToLog("$workpath/myFix.log", "<b>* * * * * * * * * * * *  myFix process status * * * * * * * * * * * *</b><br><pre>");

		//shell_exec("sudo myfix -q -t / >> $workpath/myFix.log &");
		/*$edp->writeToLog("$workpath/kpsvn/dload/myFix.sh", "sudo myfix -q -t / >> $workpath/myFix.log &");
		system_call("sh $workpath/kpsvn/dload/myFix.sh &");*/
	}
	echo "<script type=\"text/JavaScript\"> function timedRefresh(timeoutPeriod) { logVar = setTimeout(\"location.reload(true);\",timeoutPeriod); } function stopRefresh() { clearTimeout(logVar); } </script>\n";
	echo "</div>";
}

function showLoadingLog() {
	global $workpath, $edp, $ee;	

	echo "<div class='pageitem_bottom'\">";	
	if(is_dir("$workpath/kpsvn/dload/statFiles")) {
		$fcount = shell_exec("cd $workpath/kpsvn/dload/statFiles; ls | wc -l");
	}
	
	if ($fcount == "" || $fcount > 0 || !is_file("$workpath/myFix.log")) {
		echo "<body onload=\"JavaScript:timedRefresh(8000);\">";
		echo "<center><b>After starting the build process, please wait for few minutes while we download the files needed for your model.</b> [which will take approx 5 to 15 minutes depending on your internet speed] <br><br><b>Shortly you will be redirected to the build process log which will show the status of the build.</center></b>";
		echo "<img src=\"icons/big/loading.gif\" style=\"width:200px;height:30px;position:relative;left:50%;top:50%;margin:15px 0 0 -100px;\">";
		
		if ($fcount > 0)
			echo "<br><b> Files left to download/update : $fcount</b><br>";
		
		echo "<script type=\"text/JavaScript\"> function timedRefresh(timeoutPeriod) { logVar = setTimeout(\"location.reload(true);\",timeoutPeriod); } function stopRefresh() { clearTimeout(logVar); } </script>\n";
	}
	else {
		if ($fcount == 0 && is_file("$workpath/myFix.log") && !is_file("$workpath/myFix2.log"))
		{
			shell_exec("sudo myfix -q -t / >> $workpath/myFix2.log &");
			//system_call("sudo myfix -q -t / >> $workpath/myFix.log &");
		}
		echo "<img src=\"icons/big/success.png\" style=\"width:80px;height:80px;position:relative;left:50%;top:50%;margin:15px 0 0 -35px;\">";
		echo "<b><center> Build Finished, Please wait for the myFix process to finish fixing permissions and generating caches.</b> [check the build log on right side for status] <br><br><b> You can then reboot your system (or) close this app.</center></b>";
	}	
	echo "</div>";
}

?>