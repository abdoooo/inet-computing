<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg7.php" ?>
<?php include "ewmysql7.php" ?>
<?php include "phpfn7.php" ?>
<?php include "bookpostinfo.php" ?>
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
$bookpost_view = new cbookpost_view();
$Page =& $bookpost_view;

// Page init
$bookpost_view->Page_Init();

// Page main
$bookpost_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($bookpost->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var bookpost_view = new ew_Page("bookpost_view");

// page properties
bookpost_view.PageID = "view"; // page ID
bookpost_view.FormID = "fbookpostview"; // form ID
var EW_PAGE_ID = bookpost_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
bookpost_view.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
bookpost_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
bookpost_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("View") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $bookpost->TableCaption() ?>
<br><br>
<?php if ($bookpost->Export == "") { ?>
<a href="<?php echo $bookpost_view->ListUrl ?>"><?php echo $Language->Phrase("BackToList") ?></a>&nbsp;
<?php if ($Security->IsLoggedIn()) { ?>
<a href="<?php echo $bookpost_view->AddUrl ?>"><?php echo $Language->Phrase("ViewPageAddLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->IsLoggedIn()) { ?>
<a href="<?php echo $bookpost_view->EditUrl ?>"><?php echo $Language->Phrase("ViewPageEditLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->IsLoggedIn()) { ?>
<a href="<?php echo $bookpost_view->CopyUrl ?>"><?php echo $Language->Phrase("ViewPageCopyLink") ?></a>&nbsp;
<?php } ?>
<?php if ($Security->IsLoggedIn()) { ?>
<a href="<?php echo $bookpost_view->DeleteUrl ?>"><?php echo $Language->Phrase("ViewPageDeleteLink") ?></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$bookpost_view->ShowMessage();
?>
<p>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($bookpost->bookid->Visible) { // bookid ?>
	<tr<?php echo $bookpost->bookid->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->bookid->FldCaption() ?></td>
		<td<?php echo $bookpost->bookid->CellAttributes() ?>>
<div<?php echo $bookpost->bookid->ViewAttributes() ?>><?php echo $bookpost->bookid->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($bookpost->name->Visible) { // name ?>
	<tr<?php echo $bookpost->name->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->name->FldCaption() ?></td>
		<td<?php echo $bookpost->name->CellAttributes() ?>>
<div<?php echo $bookpost->name->ViewAttributes() ?>><?php echo $bookpost->name->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($bookpost->cata->Visible) { // cata ?>
	<tr<?php echo $bookpost->cata->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->cata->FldCaption() ?></td>
		<td<?php echo $bookpost->cata->CellAttributes() ?>>
<div<?php echo $bookpost->cata->ViewAttributes() ?>><?php echo $bookpost->cata->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($bookpost->author->Visible) { // author ?>
	<tr<?php echo $bookpost->author->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->author->FldCaption() ?></td>
		<td<?php echo $bookpost->author->CellAttributes() ?>>
<div<?php echo $bookpost->author->ViewAttributes() ?>><?php echo $bookpost->author->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($bookpost->publisher->Visible) { // publisher ?>
	<tr<?php echo $bookpost->publisher->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->publisher->FldCaption() ?></td>
		<td<?php echo $bookpost->publisher->CellAttributes() ?>>
<div<?php echo $bookpost->publisher->ViewAttributes() ?>><?php echo $bookpost->publisher->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($bookpost->info->Visible) { // info ?>
	<tr<?php echo $bookpost->info->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->info->FldCaption() ?></td>
		<td<?php echo $bookpost->info->CellAttributes() ?>>
<div<?php echo $bookpost->info->ViewAttributes() ?>><?php echo $bookpost->info->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($bookpost->code->Visible) { // code ?>
	<tr<?php echo $bookpost->code->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->code->FldCaption() ?></td>
		<td<?php echo $bookpost->code->CellAttributes() ?>>
<div<?php echo $bookpost->code->ViewAttributes() ?>><?php echo $bookpost->code->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($bookpost->pic->Visible) { // pic ?>
	<tr<?php echo $bookpost->pic->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->pic->FldCaption() ?></td>
		<td<?php echo $bookpost->pic->CellAttributes() ?>>
<div<?php echo $bookpost->pic->ViewAttributes() ?>><?php echo $bookpost->pic->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($bookpost->useremail->Visible) { // useremail ?>
	<tr<?php echo $bookpost->useremail->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->useremail->FldCaption() ?></td>
		<td<?php echo $bookpost->useremail->CellAttributes() ?>>
<div<?php echo $bookpost->useremail->ViewAttributes() ?>><?php echo $bookpost->useremail->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($bookpost->price->Visible) { // price ?>
	<tr<?php echo $bookpost->price->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->price->FldCaption() ?></td>
		<td<?php echo $bookpost->price->CellAttributes() ?>>
<div<?php echo $bookpost->price->ViewAttributes() ?>><?php echo $bookpost->price->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($bookpost->datatime->Visible) { // datatime ?>
	<tr<?php echo $bookpost->datatime->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->datatime->FldCaption() ?></td>
		<td<?php echo $bookpost->datatime->CellAttributes() ?>>
<div<?php echo $bookpost->datatime->ViewAttributes() ?>><?php echo $bookpost->datatime->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($bookpost->hidden->Visible) { // hidden ?>
	<tr<?php echo $bookpost->hidden->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->hidden->FldCaption() ?></td>
		<td<?php echo $bookpost->hidden->CellAttributes() ?>>
<div<?php echo $bookpost->hidden->ViewAttributes() ?>><?php echo $bookpost->hidden->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<?php if ($bookpost->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php
$bookpost_view->Page_Terminate();
?>
<?php

//
// Page class
//
class cbookpost_view {

	// Page ID
	var $PageID = 'view';

	// Table name
	var $TableName = 'bookpost';

	// Page object name
	var $PageObjName = 'bookpost_view';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $bookpost;
		if ($bookpost->UseTokenInUrl) $PageUrl .= "t=" . $bookpost->TableVar . "&"; // Add page token
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
		global $objForm, $bookpost;
		if ($bookpost->UseTokenInUrl) {
			if ($objForm)
				return ($bookpost->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($bookpost->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cbookpost_view() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (bookpost)
		$GLOBALS["bookpost"] = new cbookpost();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'bookpost', TRUE);

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
		global $bookpost;

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
		global $Language, $bookpost;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["bookid"] <> "") {
				$bookpost->bookid->setQueryStringValue($_GET["bookid"]);
				$this->arRecKey["bookid"] = $bookpost->bookid->QueryStringValue;
			} else {
				$sReturnUrl = "bookpostlist.php"; // Return to list
			}

			// Get action
			$bookpost->CurrentAction = "I"; // Display form
			switch ($bookpost->CurrentAction) {
				case "I": // Get a record to display
					if (!$this->LoadRow()) { // Load record based on key
						$this->setMessage($Language->Phrase("NoRecord")); // Set no record message
						$sReturnUrl = "bookpostlist.php"; // No matching record, return to list
					}
			}
		} else {
			$sReturnUrl = "bookpostlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$bookpost->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $bookpost;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$bookpost->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$bookpost->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $bookpost->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$bookpost->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$bookpost->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$bookpost->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $bookpost;
		$sFilter = $bookpost->KeyFilter();

		// Call Row Selecting event
		$bookpost->Row_Selecting($sFilter);

		// Load SQL based on filter
		$bookpost->CurrentFilter = $sFilter;
		$sSql = $bookpost->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values

			// Call Row Selected event
			$bookpost->Row_Selected($rs);
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $bookpost;
		$bookpost->bookid->setDbValue($rs->fields('bookid'));
		$bookpost->name->setDbValue($rs->fields('name'));
		$bookpost->cata->setDbValue($rs->fields('cata'));
		$bookpost->author->setDbValue($rs->fields('author'));
		$bookpost->publisher->setDbValue($rs->fields('publisher'));
		$bookpost->info->setDbValue($rs->fields('info'));
		$bookpost->code->setDbValue($rs->fields('code'));
		$bookpost->pic->setDbValue($rs->fields('pic'));
		$bookpost->useremail->setDbValue($rs->fields('useremail'));
		$bookpost->price->setDbValue($rs->fields('price'));
		$bookpost->datatime->setDbValue($rs->fields('datatime'));
		$bookpost->hidden->setDbValue($rs->fields('hidden'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $bookpost;

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print&" . "bookid=" . urlencode($bookpost->bookid->CurrentValue);
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html&" . "bookid=" . urlencode($bookpost->bookid->CurrentValue);
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel&" . "bookid=" . urlencode($bookpost->bookid->CurrentValue);
		$this->ExportWordUrl = $this->PageUrl() . "export=word&" . "bookid=" . urlencode($bookpost->bookid->CurrentValue);
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml&" . "bookid=" . urlencode($bookpost->bookid->CurrentValue);
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv&" . "bookid=" . urlencode($bookpost->bookid->CurrentValue);
		$this->AddUrl = $bookpost->AddUrl();
		$this->EditUrl = $bookpost->EditUrl();
		$this->CopyUrl = $bookpost->CopyUrl();
		$this->DeleteUrl = $bookpost->DeleteUrl();
		$this->ListUrl = $bookpost->ListUrl();

		// Call Row_Rendering event
		$bookpost->Row_Rendering();

		// Common render codes for all row types
		// bookid

		$bookpost->bookid->CellCssStyle = ""; $bookpost->bookid->CellCssClass = "";
		$bookpost->bookid->CellAttrs = array(); $bookpost->bookid->ViewAttrs = array(); $bookpost->bookid->EditAttrs = array();

		// name
		$bookpost->name->CellCssStyle = ""; $bookpost->name->CellCssClass = "";
		$bookpost->name->CellAttrs = array(); $bookpost->name->ViewAttrs = array(); $bookpost->name->EditAttrs = array();

		// cata
		$bookpost->cata->CellCssStyle = ""; $bookpost->cata->CellCssClass = "";
		$bookpost->cata->CellAttrs = array(); $bookpost->cata->ViewAttrs = array(); $bookpost->cata->EditAttrs = array();

		// author
		$bookpost->author->CellCssStyle = ""; $bookpost->author->CellCssClass = "";
		$bookpost->author->CellAttrs = array(); $bookpost->author->ViewAttrs = array(); $bookpost->author->EditAttrs = array();

		// publisher
		$bookpost->publisher->CellCssStyle = ""; $bookpost->publisher->CellCssClass = "";
		$bookpost->publisher->CellAttrs = array(); $bookpost->publisher->ViewAttrs = array(); $bookpost->publisher->EditAttrs = array();

		// info
		$bookpost->info->CellCssStyle = ""; $bookpost->info->CellCssClass = "";
		$bookpost->info->CellAttrs = array(); $bookpost->info->ViewAttrs = array(); $bookpost->info->EditAttrs = array();

		// code
		$bookpost->code->CellCssStyle = ""; $bookpost->code->CellCssClass = "";
		$bookpost->code->CellAttrs = array(); $bookpost->code->ViewAttrs = array(); $bookpost->code->EditAttrs = array();

		// pic
		$bookpost->pic->CellCssStyle = ""; $bookpost->pic->CellCssClass = "";
		$bookpost->pic->CellAttrs = array(); $bookpost->pic->ViewAttrs = array(); $bookpost->pic->EditAttrs = array();

		// useremail
		$bookpost->useremail->CellCssStyle = ""; $bookpost->useremail->CellCssClass = "";
		$bookpost->useremail->CellAttrs = array(); $bookpost->useremail->ViewAttrs = array(); $bookpost->useremail->EditAttrs = array();

		// price
		$bookpost->price->CellCssStyle = ""; $bookpost->price->CellCssClass = "";
		$bookpost->price->CellAttrs = array(); $bookpost->price->ViewAttrs = array(); $bookpost->price->EditAttrs = array();

		// datatime
		$bookpost->datatime->CellCssStyle = ""; $bookpost->datatime->CellCssClass = "";
		$bookpost->datatime->CellAttrs = array(); $bookpost->datatime->ViewAttrs = array(); $bookpost->datatime->EditAttrs = array();

		// hidden
		$bookpost->hidden->CellCssStyle = ""; $bookpost->hidden->CellCssClass = "";
		$bookpost->hidden->CellAttrs = array(); $bookpost->hidden->ViewAttrs = array(); $bookpost->hidden->EditAttrs = array();
		if ($bookpost->RowType == EW_ROWTYPE_VIEW) { // View row

			// bookid
			$bookpost->bookid->ViewValue = $bookpost->bookid->CurrentValue;
			$bookpost->bookid->CssStyle = "";
			$bookpost->bookid->CssClass = "";
			$bookpost->bookid->ViewCustomAttributes = "";

			// name
			$bookpost->name->ViewValue = $bookpost->name->CurrentValue;
			$bookpost->name->CssStyle = "";
			$bookpost->name->CssClass = "";
			$bookpost->name->ViewCustomAttributes = "";

			// cata
			if (strval($bookpost->cata->CurrentValue) <> "") {
				switch ($bookpost->cata->CurrentValue) {
					case "eng":
						$bookpost->cata->ViewValue = "English";
						break;
					case "lan":
						$bookpost->cata->ViewValue = "Languages";
						break;
					case "his":
						$bookpost->cata->ViewValue = "History";
						break;
					case "acc":
						$bookpost->cata->ViewValue = "Accounting";
						break;
					case "sci":
						$bookpost->cata->ViewValue = "Science";
						break;
					case "com":
						$bookpost->cata->ViewValue = "Computer";
						break;
					case "engi":
						$bookpost->cata->ViewValue = "Engineering";
						break;
					case "mus":
						$bookpost->cata->ViewValue = "Music";
						break;
					case "art":
						$bookpost->cata->ViewValue = "Art";
						break;
					case "oth":
						$bookpost->cata->ViewValue = "Other";
						break;
					default:
						$bookpost->cata->ViewValue = $bookpost->cata->CurrentValue;
				}
			} else {
				$bookpost->cata->ViewValue = NULL;
			}
			$bookpost->cata->CssStyle = "";
			$bookpost->cata->CssClass = "";
			$bookpost->cata->ViewCustomAttributes = "";

			// author
			$bookpost->author->ViewValue = $bookpost->author->CurrentValue;
			$bookpost->author->CssStyle = "";
			$bookpost->author->CssClass = "";
			$bookpost->author->ViewCustomAttributes = "";

			// publisher
			$bookpost->publisher->ViewValue = $bookpost->publisher->CurrentValue;
			$bookpost->publisher->CssStyle = "";
			$bookpost->publisher->CssClass = "";
			$bookpost->publisher->ViewCustomAttributes = "";

			// info
			$bookpost->info->ViewValue = $bookpost->info->CurrentValue;
			$bookpost->info->CssStyle = "";
			$bookpost->info->CssClass = "";
			$bookpost->info->ViewCustomAttributes = "";

			// code
			$bookpost->code->ViewValue = $bookpost->code->CurrentValue;
			$bookpost->code->CssStyle = "";
			$bookpost->code->CssClass = "";
			$bookpost->code->ViewCustomAttributes = "";

			// pic
			$bookpost->pic->ViewValue = $bookpost->pic->CurrentValue;
			$bookpost->pic->CssStyle = "";
			$bookpost->pic->CssClass = "";
			$bookpost->pic->ViewCustomAttributes = "";

			// useremail
			$bookpost->useremail->ViewValue = $bookpost->useremail->CurrentValue;
			$bookpost->useremail->CssStyle = "";
			$bookpost->useremail->CssClass = "";
			$bookpost->useremail->ViewCustomAttributes = "";

			// price
			$bookpost->price->ViewValue = $bookpost->price->CurrentValue;
			$bookpost->price->CssStyle = "";
			$bookpost->price->CssClass = "";
			$bookpost->price->ViewCustomAttributes = "";

			// datatime
			$bookpost->datatime->ViewValue = $bookpost->datatime->CurrentValue;
			$bookpost->datatime->ViewValue = ew_FormatDateTime($bookpost->datatime->ViewValue, 5);
			$bookpost->datatime->CssStyle = "";
			$bookpost->datatime->CssClass = "";
			$bookpost->datatime->ViewCustomAttributes = "";

			// hidden
			if (strval($bookpost->hidden->CurrentValue) <> "") {
				switch ($bookpost->hidden->CurrentValue) {
					case "1":
						$bookpost->hidden->ViewValue = "Yes";
						break;
					case "0":
						$bookpost->hidden->ViewValue = "No";
						break;
					default:
						$bookpost->hidden->ViewValue = $bookpost->hidden->CurrentValue;
				}
			} else {
				$bookpost->hidden->ViewValue = NULL;
			}
			$bookpost->hidden->CssStyle = "";
			$bookpost->hidden->CssClass = "";
			$bookpost->hidden->ViewCustomAttributes = "";

			// bookid
			$bookpost->bookid->HrefValue = "";
			$bookpost->bookid->TooltipValue = "";

			// name
			$bookpost->name->HrefValue = "";
			$bookpost->name->TooltipValue = "";

			// cata
			$bookpost->cata->HrefValue = "";
			$bookpost->cata->TooltipValue = "";

			// author
			$bookpost->author->HrefValue = "";
			$bookpost->author->TooltipValue = "";

			// publisher
			$bookpost->publisher->HrefValue = "";
			$bookpost->publisher->TooltipValue = "";

			// info
			$bookpost->info->HrefValue = "";
			$bookpost->info->TooltipValue = "";

			// code
			$bookpost->code->HrefValue = "";
			$bookpost->code->TooltipValue = "";

			// pic
			$bookpost->pic->HrefValue = "";
			$bookpost->pic->TooltipValue = "";

			// useremail
			$bookpost->useremail->HrefValue = "";
			$bookpost->useremail->TooltipValue = "";

			// price
			$bookpost->price->HrefValue = "";
			$bookpost->price->TooltipValue = "";

			// datatime
			$bookpost->datatime->HrefValue = "";
			$bookpost->datatime->TooltipValue = "";

			// hidden
			$bookpost->hidden->HrefValue = "";
			$bookpost->hidden->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($bookpost->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$bookpost->Row_Rendered();
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
