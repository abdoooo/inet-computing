<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "userinfoinfo.php" ?>
<?php include "userfn7.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Create page object
$userinfo_view = new cuserinfo_view();
$Page =& $userinfo_view;

// Page init
$userinfo_view->Page_Init();

// Page main
$userinfo_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($userinfo->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var userinfo_view = new ew_Page("userinfo_view");

// page properties
userinfo_view.PageID = "view"; // page ID
userinfo_view.FormID = "fuserinfoview"; // form ID
var EW_PAGE_ID = userinfo_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
userinfo_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
userinfo_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
userinfo_view.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<?php } ?>
<p><span class="phpmaker"><?php echo $Language->Phrase("View") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $userinfo->TableCaption() ?>
<br><br>
<?php if ($userinfo->Export == "") { ?>
<a href="<?php echo $userinfo_view->ListUrl ?>"><?php echo $Language->Phrase("BackToList") ?></a>&nbsp;
<?php if ($Security->IsLoggedIn()) { ?>
<a href="<?php echo $userinfo_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->IsLoggedIn()) { ?>
<a href="<?php echo $userinfo_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->IsLoggedIn()) { ?>
<a href="<?php echo $userinfo_view->CopyUrl ?>"><?php echo $Language->Phrase("ViewPageCopyLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->IsLoggedIn()) { ?>
<a href="<?php echo $userinfo_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$userinfo_view->ShowMessage();
?>
<p>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($userinfo->zuserid->Visible) { // userid ?>
	<tr<?php echo $userinfo->zuserid->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $userinfo->zuserid->FldCaption() ?></td>
		<td<?php echo $userinfo->zuserid->CellAttributes() ?>>
<div<?php echo $userinfo->zuserid->ViewAttributes() ?>><?php echo $userinfo->zuserid->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($userinfo->zemail->Visible) { // email ?>
	<tr<?php echo $userinfo->zemail->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $userinfo->zemail->FldCaption() ?></td>
		<td<?php echo $userinfo->zemail->CellAttributes() ?>>
<div<?php echo $userinfo->zemail->ViewAttributes() ?>><?php echo $userinfo->zemail->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($userinfo->firstname->Visible) { // firstname ?>
	<tr<?php echo $userinfo->firstname->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $userinfo->firstname->FldCaption() ?></td>
		<td<?php echo $userinfo->firstname->CellAttributes() ?>>
<div<?php echo $userinfo->firstname->ViewAttributes() ?>><?php echo $userinfo->firstname->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($userinfo->lastname->Visible) { // lastname ?>
	<tr<?php echo $userinfo->lastname->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $userinfo->lastname->FldCaption() ?></td>
		<td<?php echo $userinfo->lastname->CellAttributes() ?>>
<div<?php echo $userinfo->lastname->ViewAttributes() ?>><?php echo $userinfo->lastname->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($userinfo->password->Visible) { // password ?>
	<tr<?php echo $userinfo->password->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $userinfo->password->FldCaption() ?></td>
		<td<?php echo $userinfo->password->CellAttributes() ?>>
<div<?php echo $userinfo->password->ViewAttributes() ?>><?php echo $userinfo->password->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($userinfo->facebook->Visible) { // facebook ?>
	<tr<?php echo $userinfo->facebook->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $userinfo->facebook->FldCaption() ?></td>
		<td<?php echo $userinfo->facebook->CellAttributes() ?>>
<div<?php echo $userinfo->facebook->ViewAttributes() ?>><?php echo $userinfo->facebook->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($userinfo->logintime->Visible) { // logintime ?>
	<tr<?php echo $userinfo->logintime->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $userinfo->logintime->FldCaption() ?></td>
		<td<?php echo $userinfo->logintime->CellAttributes() ?>>
<div<?php echo $userinfo->logintime->ViewAttributes() ?>><?php echo $userinfo->logintime->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($userinfo->block->Visible) { // block ?>
	<tr<?php echo $userinfo->block->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $userinfo->block->FldCaption() ?></td>
		<td<?php echo $userinfo->block->CellAttributes() ?>>
<div<?php echo $userinfo->block->ViewAttributes() ?>><?php echo $userinfo->block->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<?php if ($userinfo->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$userinfo_view->Page_Terminate();
?>
<?php

//
// Page class
//
class cuserinfo_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 'userinfo';

	// Page object name
	var $PageObjName = 'userinfo_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $userinfo;
		if ($userinfo->UseTokenInUrl) $PageUrl .= "t=" . $userinfo->TableVar . "&"; // Add page token
		return $PageUrl;
	}

	// Page URLs
	var $AddUrl;
	var $EditUrl;
	var $CopyUrl;
	var $DeleteUrl;
	var $ViewUrl;
	var $ListUrl;

	// Export URLs
	var $ExportPrintUrl;
	var $ExportHtmlUrl;
	var $ExportExcelUrl;
	var $ExportWordUrl;
	var $ExportXmlUrl;
	var $ExportCsvUrl;

	// Update URLs
	var $InlineAddUrl;
	var $InlineCopyUrl;
	var $InlineEditUrl;
	var $GridAddUrl;
	var $GridEditUrl;
	var $MultiDeleteUrl;
	var $MultiUpdateUrl;

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		if (@$_SESSION[EW_SESSION_MESSAGE] <> "") { // Append
			$_SESSION[EW_SESSION_MESSAGE] .= "<br>" . $v;
		} else {
			$_SESSION[EW_SESSION_MESSAGE] = $v;
		}
	}

	// Show message
	function ShowMessage() {
		$sMessage = $this->getMessage();
		$this->Message_Showing($sMessage);
		if ($sMessage <> "") { // Message in Session, display
			echo "<p><span class=\"ewMessage\">" . $sMessage . "</span></p>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}
	}

	// Validate page request
	function IsPageRequest() {
		global $objForm, $userinfo;
		if ($userinfo->UseTokenInUrl) {
			if ($objForm)
				return ($userinfo->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($userinfo->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cuserinfo_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (userinfo)
		$GLOBALS["userinfo"] = new cuserinfo();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'userinfo', TRUE);

		// Start timer
		$GLOBALS["gsTimer"] = new cTimer();

		// Open connection
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;
		global $userinfo;

		// Security
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();
	}

	//
	// Page_Terminate
	//
	function Page_Terminate($url = "") {
		global $conn;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		 // Close connection
		$conn->Close();

		// Go to URL if specified
		$this->Page_Redirecting($url);
		if ($url <> "") {
			if (!EW_DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			header("Location: " . $url);
		}
		exit();
	}
	var $lDisplayRecs = 1;
	var $lStartRec;
	var $lStopRec;
	var $lTotalRecs = 0;
	var $lRecRange = 10;
	var $lRecCnt;
	var $arRecKey = array();

	//
	// Page main
	//
	function Page_Main() {
		global $Language, $userinfo;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["zuserid"] <> "") {
				$userinfo->zuserid->setQueryStringValue($_GET["zuserid"]);
				$this->arRecKey["zuserid"] = $userinfo->zuserid->QueryStringValue;
			} else {
				$sReturnUrl = "userinfolist.php"; // Return to list
			}

			// Get action
			$userinfo->CurrentAction = "I"; // Display form
			switch ($userinfo->CurrentAction) {
				case "I": // Get a record to display
					if (!$this->LoadRow()) { // Load record based on key
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$sReturnUrl = "userinfolist.php"; // No matching record, return to list
					}
			}
		} else {
			$sReturnUrl = "userinfolist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$userinfo->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $userinfo;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$userinfo->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$userinfo->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $userinfo->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$userinfo->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$userinfo->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$userinfo->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $userinfo;
		$sFilter = $userinfo->KeyFilter();

		// Call Row Selecting event
		$userinfo->Row_Selecting($sFilter);

		// Load SQL based on filter
		$userinfo->CurrentFilter = $sFilter;
		$sSql = $userinfo->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$userinfo->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $userinfo;
		$userinfo->zuserid->setDbValue($rs->fields('userid'));
		$userinfo->zemail->setDbValue($rs->fields('email'));
		$userinfo->firstname->setDbValue($rs->fields('firstname'));
		$userinfo->lastname->setDbValue($rs->fields('lastname'));
		$userinfo->password->setDbValue($rs->fields('password'));
		$userinfo->facebook->setDbValue($rs->fields('facebook'));
		$userinfo->logintime->setDbValue($rs->fields('logintime'));
		$userinfo->block->setDbValue($rs->fields('block'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $userinfo;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "zuserid=" . urlencode($userinfo->zuserid->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "zuserid=" . urlencode($userinfo->zuserid->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "zuserid=" . urlencode($userinfo->zuserid->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "zuserid=" . urlencode($userinfo->zuserid->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "zuserid=" . urlencode($userinfo->zuserid->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "zuserid=" . urlencode($userinfo->zuserid->CurrentValue);
		$this->AddUrl = $userinfo->AddUrl();
		$this->EditUrl = $userinfo->EditUrl();
		$this->CopyUrl = $userinfo->CopyUrl();
		$this->DeleteUrl = $userinfo->DeleteUrl();
		$this->ListUrl = $userinfo->ListUrl();

		// Call Row_Rendering event
		$userinfo->Row_Rendering();

		// Common render codes for all row types
		// userid

		$userinfo->zuserid->CellCssStyle = ""; $userinfo->zuserid->CellCssClass = "";
		$userinfo->zuserid->CellAttrs = array(); $userinfo->zuserid->ViewAttrs = array(); $userinfo->zuserid->EditAttrs = array();

		// email
		$userinfo->zemail->CellCssStyle = ""; $userinfo->zemail->CellCssClass = "";
		$userinfo->zemail->CellAttrs = array(); $userinfo->zemail->ViewAttrs = array(); $userinfo->zemail->EditAttrs = array();

		// firstname
		$userinfo->firstname->CellCssStyle = ""; $userinfo->firstname->CellCssClass = "";
		$userinfo->firstname->CellAttrs = array(); $userinfo->firstname->ViewAttrs = array(); $userinfo->firstname->EditAttrs = array();

		// lastname
		$userinfo->lastname->CellCssStyle = ""; $userinfo->lastname->CellCssClass = "";
		$userinfo->lastname->CellAttrs = array(); $userinfo->lastname->ViewAttrs = array(); $userinfo->lastname->EditAttrs = array();

		// password
		$userinfo->password->CellCssStyle = ""; $userinfo->password->CellCssClass = "";
		$userinfo->password->CellAttrs = array(); $userinfo->password->ViewAttrs = array(); $userinfo->password->EditAttrs = array();

		// facebook
		$userinfo->facebook->CellCssStyle = ""; $userinfo->facebook->CellCssClass = "";
		$userinfo->facebook->CellAttrs = array(); $userinfo->facebook->ViewAttrs = array(); $userinfo->facebook->EditAttrs = array();

		// logintime
		$userinfo->logintime->CellCssStyle = ""; $userinfo->logintime->CellCssClass = "";
		$userinfo->logintime->CellAttrs = array(); $userinfo->logintime->ViewAttrs = array(); $userinfo->logintime->EditAttrs = array();

		// block
		$userinfo->block->CellCssStyle = ""; $userinfo->block->CellCssClass = "";
		$userinfo->block->CellAttrs = array(); $userinfo->block->ViewAttrs = array(); $userinfo->block->EditAttrs = array();
		if ($userinfo->RowType == EW_ROWTYPE_VIEW) { // View row

			// userid
			$userinfo->zuserid->ViewValue = $userinfo->zuserid->CurrentValue;
			$userinfo->zuserid->CssStyle = "";
			$userinfo->zuserid->CssClass = "";
			$userinfo->zuserid->ViewCustomAttributes = "";

			// email
			$userinfo->zemail->ViewValue = $userinfo->zemail->CurrentValue;
			$userinfo->zemail->CssStyle = "";
			$userinfo->zemail->CssClass = "";
			$userinfo->zemail->ViewCustomAttributes = "";

			// firstname
			$userinfo->firstname->ViewValue = $userinfo->firstname->CurrentValue;
			$userinfo->firstname->CssStyle = "";
			$userinfo->firstname->CssClass = "";
			$userinfo->firstname->ViewCustomAttributes = "";

			// lastname
			$userinfo->lastname->ViewValue = $userinfo->lastname->CurrentValue;
			$userinfo->lastname->CssStyle = "";
			$userinfo->lastname->CssClass = "";
			$userinfo->lastname->ViewCustomAttributes = "";

			// password
			$userinfo->password->ViewValue = $userinfo->password->CurrentValue;
			$userinfo->password->CssStyle = "";
			$userinfo->password->CssClass = "";
			$userinfo->password->ViewCustomAttributes = "";

			// facebook
			$userinfo->facebook->ViewValue = $userinfo->facebook->CurrentValue;
			$userinfo->facebook->CssStyle = "";
			$userinfo->facebook->CssClass = "";
			$userinfo->facebook->ViewCustomAttributes = "";

			// logintime
			$userinfo->logintime->ViewValue = $userinfo->logintime->CurrentValue;
			$userinfo->logintime->ViewValue = ew_FormatDateTime($userinfo->logintime->ViewValue, 5);
			$userinfo->logintime->CssStyle = "";
			$userinfo->logintime->CssClass = "";
			$userinfo->logintime->ViewCustomAttributes = "";

			// block
			$userinfo->block->ViewValue = $userinfo->block->CurrentValue;
			$userinfo->block->CssStyle = "";
			$userinfo->block->CssClass = "";
			$userinfo->block->ViewCustomAttributes = "";

			// userid
			$userinfo->zuserid->HrefValue = "";
			$userinfo->zuserid->TooltipValue = "";

			// email
			$userinfo->zemail->HrefValue = "";
			$userinfo->zemail->TooltipValue = "";

			// firstname
			$userinfo->firstname->HrefValue = "";
			$userinfo->firstname->TooltipValue = "";

			// lastname
			$userinfo->lastname->HrefValue = "";
			$userinfo->lastname->TooltipValue = "";

			// password
			$userinfo->password->HrefValue = "";
			$userinfo->password->TooltipValue = "";

			// facebook
			$userinfo->facebook->HrefValue = "";
			$userinfo->facebook->TooltipValue = "";

			// logintime
			$userinfo->logintime->HrefValue = "";
			$userinfo->logintime->TooltipValue = "";

			// block
			$userinfo->block->HrefValue = "";
			$userinfo->block->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($userinfo->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$userinfo->Row_Rendered();
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	function Message_Showing(&$msg) {

		// Example:
		//$msg = "your new message";

	}
}
?>
