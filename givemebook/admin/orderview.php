<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "orderinfo.php" ?>
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
$order_view = new corder_view();
$Page =& $order_view;

// Page init
$order_view->Page_Init();

// Page main
$order_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($order->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var order_view = new ew_Page("order_view");

// page properties
order_view.PageID = "view"; // page ID
order_view.FormID = "forderview"; // form ID
var EW_PAGE_ID = order_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
order_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
order_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
order_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("View") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $order->TableCaption() ?>
<br><br>
<?php if ($order->Export == "") { ?>
<a href="<?php echo $order_view->ListUrl ?>"><?php echo $Language->Phrase("BackToList") ?></a>&nbsp;
<?php if ($Security->IsLoggedIn()) { ?>
<a href="<?php echo $order_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->IsLoggedIn()) { ?>
<a href="<?php echo $order_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->IsLoggedIn()) { ?>
<a href="<?php echo $order_view->CopyUrl ?>"><?php echo $Language->Phrase("ViewPageCopyLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->IsLoggedIn()) { ?>
<a href="<?php echo $order_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$order_view->ShowMessage();
?>
<p>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($order->orderid->Visible) { // orderid ?>
	<tr<?php echo $order->orderid->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $order->orderid->FldCaption() ?></td>
		<td<?php echo $order->orderid->CellAttributes() ?>>
<div<?php echo $order->orderid->ViewAttributes() ?>><?php echo $order->orderid->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($order->bookid->Visible) { // bookid ?>
	<tr<?php echo $order->bookid->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $order->bookid->FldCaption() ?></td>
		<td<?php echo $order->bookid->CellAttributes() ?>>
<div<?php echo $order->bookid->ViewAttributes() ?>><?php echo $order->bookid->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($order->orderstatus->Visible) { // orderstatus ?>
	<tr<?php echo $order->orderstatus->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $order->orderstatus->FldCaption() ?></td>
		<td<?php echo $order->orderstatus->CellAttributes() ?>>
<div<?php echo $order->orderstatus->ViewAttributes() ?>><?php echo $order->orderstatus->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($order->zemail->Visible) { // email ?>
	<tr<?php echo $order->zemail->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $order->zemail->FldCaption() ?></td>
		<td<?php echo $order->zemail->CellAttributes() ?>>
<div<?php echo $order->zemail->ViewAttributes() ?>><?php echo $order->zemail->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($order->datatime->Visible) { // datatime ?>
	<tr<?php echo $order->datatime->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $order->datatime->FldCaption() ?></td>
		<td<?php echo $order->datatime->CellAttributes() ?>>
<div<?php echo $order->datatime->ViewAttributes() ?>><?php echo $order->datatime->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<?php if ($order->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$order_view->Page_Terminate();
?>
<?php

//
// Page class
//
class corder_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 'order';

	// Page object name
	var $PageObjName = 'order_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $order;
		if ($order->UseTokenInUrl) $PageUrl .= "t=" . $order->TableVar . "&"; // Add page token
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
		global $objForm, $order;
		if ($order->UseTokenInUrl) {
			if ($objForm)
				return ($order->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($order->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function corder_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (order)
		$GLOBALS["order"] = new corder();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'order', TRUE);

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
		global $order;

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
		global $Language, $order;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["orderid"] <> "") {
				$order->orderid->setQueryStringValue($_GET["orderid"]);
				$this->arRecKey["orderid"] = $order->orderid->QueryStringValue;
			} else {
				$sReturnUrl = "orderlist.php"; // Return to list
			}

			// Get action
			$order->CurrentAction = "I"; // Display form
			switch ($order->CurrentAction) {
				case "I": // Get a record to display
					if (!$this->LoadRow()) { // Load record based on key
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$sReturnUrl = "orderlist.php"; // No matching record, return to list
					}
			}
		} else {
			$sReturnUrl = "orderlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$order->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $order;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$order->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$order->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $order->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$order->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$order->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$order->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $order;
		$sFilter = $order->KeyFilter();

		// Call Row Selecting event
		$order->Row_Selecting($sFilter);

		// Load SQL based on filter
		$order->CurrentFilter = $sFilter;
		$sSql = $order->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$order->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $order;
		$order->orderid->setDbValue($rs->fields('orderid'));
		$order->bookid->setDbValue($rs->fields('bookid'));
		$order->orderstatus->setDbValue($rs->fields('orderstatus'));
		$order->zemail->setDbValue($rs->fields('email'));
		$order->datatime->setDbValue($rs->fields('datatime'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $order;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "orderid=" . urlencode($order->orderid->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "orderid=" . urlencode($order->orderid->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "orderid=" . urlencode($order->orderid->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "orderid=" . urlencode($order->orderid->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "orderid=" . urlencode($order->orderid->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "orderid=" . urlencode($order->orderid->CurrentValue);
		$this->AddUrl = $order->AddUrl();
		$this->EditUrl = $order->EditUrl();
		$this->CopyUrl = $order->CopyUrl();
		$this->DeleteUrl = $order->DeleteUrl();
		$this->ListUrl = $order->ListUrl();

		// Call Row_Rendering event
		$order->Row_Rendering();

		// Common render codes for all row types
		// orderid

		$order->orderid->CellCssStyle = ""; $order->orderid->CellCssClass = "";
		$order->orderid->CellAttrs = array(); $order->orderid->ViewAttrs = array(); $order->orderid->EditAttrs = array();

		// bookid
		$order->bookid->CellCssStyle = ""; $order->bookid->CellCssClass = "";
		$order->bookid->CellAttrs = array(); $order->bookid->ViewAttrs = array(); $order->bookid->EditAttrs = array();

		// orderstatus
		$order->orderstatus->CellCssStyle = ""; $order->orderstatus->CellCssClass = "";
		$order->orderstatus->CellAttrs = array(); $order->orderstatus->ViewAttrs = array(); $order->orderstatus->EditAttrs = array();

		// email
		$order->zemail->CellCssStyle = ""; $order->zemail->CellCssClass = "";
		$order->zemail->CellAttrs = array(); $order->zemail->ViewAttrs = array(); $order->zemail->EditAttrs = array();

		// datatime
		$order->datatime->CellCssStyle = ""; $order->datatime->CellCssClass = "";
		$order->datatime->CellAttrs = array(); $order->datatime->ViewAttrs = array(); $order->datatime->EditAttrs = array();
		if ($order->RowType == EW_ROWTYPE_VIEW) { // View row

			// orderid
			$order->orderid->ViewValue = $order->orderid->CurrentValue;
			$order->orderid->CssStyle = "";
			$order->orderid->CssClass = "";
			$order->orderid->ViewCustomAttributes = "";

			// bookid
			$order->bookid->ViewValue = $order->bookid->CurrentValue;
			$order->bookid->CssStyle = "";
			$order->bookid->CssClass = "";
			$order->bookid->ViewCustomAttributes = "";

			// orderstatus
			$order->orderstatus->ViewValue = $order->orderstatus->CurrentValue;
			$order->orderstatus->CssStyle = "";
			$order->orderstatus->CssClass = "";
			$order->orderstatus->ViewCustomAttributes = "";

			// email
			$order->zemail->ViewValue = $order->zemail->CurrentValue;
			$order->zemail->CssStyle = "";
			$order->zemail->CssClass = "";
			$order->zemail->ViewCustomAttributes = "";

			// datatime
			$order->datatime->ViewValue = $order->datatime->CurrentValue;
			$order->datatime->ViewValue = ew_FormatDateTime($order->datatime->ViewValue, 5);
			$order->datatime->CssStyle = "";
			$order->datatime->CssClass = "";
			$order->datatime->ViewCustomAttributes = "";

			// orderid
			$order->orderid->HrefValue = "";
			$order->orderid->TooltipValue = "";

			// bookid
			$order->bookid->HrefValue = "";
			$order->bookid->TooltipValue = "";

			// orderstatus
			$order->orderstatus->HrefValue = "";
			$order->orderstatus->TooltipValue = "";

			// email
			$order->zemail->HrefValue = "";
			$order->zemail->TooltipValue = "";

			// datatime
			$order->datatime->HrefValue = "";
			$order->datatime->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($order->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$order->Row_Rendered();
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
