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
$order_list = new corder_list();
$Page =& $order_list;

// Page init
$order_list->Page_Init();

// Page main
$order_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($order->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var order_list = new ew_Page("order_list");

// page properties
order_list.PageID = "list"; // page ID
order_list.FormID = "forderlist"; // form ID
var EW_PAGE_ID = order_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
order_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
order_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
order_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($order->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$order_list->lTotalRecs = $order->SelectRecordCount();
	} else {
		if ($rs = $order_list->LoadRecordset())
			$order_list->lTotalRecs = $rs->RecordCount();
	}
	$order_list->lStartRec = 1;
	if ($order_list->lDisplayRecs <= 0 || ($order->Export <> "" && $order->ExportAll)) // Display all records
		$order_list->lDisplayRecs = $order_list->lTotalRecs;
	if (!($order->Export <> "" && $order->ExportAll))
		$order_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $order_list->LoadRecordset($order_list->lStartRec-1, $order_list->lDisplayRecs);
?>
<p><span class="phpmaker" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $order->TableCaption() ?>
</span></p>
<?php if ($Security->IsLoggedIn()) { ?>
<?php if ($order->Export == "" && $order->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(order_list);" style="text-decoration: none;"><img id="order_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="order_list_SearchPanel">
<form name="forderlistsrch" id="forderlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="order">
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($order->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $order_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($order->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($order->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($order->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$order_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<form name="forderlist" id="forderlist" class="ewForm" action="" method="post">
<div id="gmp_order" class="ewGridMiddlePanel">
<?php if ($order_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $order->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$order_list->RenderListOptions();

// Render list options (header, left)
$order_list->ListOptions->Render("header", "left");
?>
<?php if ($order->orderid->Visible) { // orderid ?>
	<?php if ($order->SortUrl($order->orderid) == "") { ?>
		<td><?php echo $order->orderid->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $order->SortUrl($order->orderid) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $order->orderid->FldCaption() ?></td><td style="width: 10px;"><?php if ($order->orderid->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($order->orderid->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($order->bookid->Visible) { // bookid ?>
	<?php if ($order->SortUrl($order->bookid) == "") { ?>
		<td><?php echo $order->bookid->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $order->SortUrl($order->bookid) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $order->bookid->FldCaption() ?></td><td style="width: 10px;"><?php if ($order->bookid->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($order->bookid->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($order->orderstatus->Visible) { // orderstatus ?>
	<?php if ($order->SortUrl($order->orderstatus) == "") { ?>
		<td><?php echo $order->orderstatus->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $order->SortUrl($order->orderstatus) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $order->orderstatus->FldCaption() ?></td><td style="width: 10px;"><?php if ($order->orderstatus->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($order->orderstatus->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($order->zemail->Visible) { // email ?>
	<?php if ($order->SortUrl($order->zemail) == "") { ?>
		<td><?php echo $order->zemail->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $order->SortUrl($order->zemail) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $order->zemail->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($order->zemail->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($order->zemail->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($order->datatime->Visible) { // datatime ?>
	<?php if ($order->SortUrl($order->datatime) == "") { ?>
		<td><?php echo $order->datatime->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $order->SortUrl($order->datatime) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $order->datatime->FldCaption() ?></td><td style="width: 10px;"><?php if ($order->datatime->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($order->datatime->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$order_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($order->ExportAll && $order->Export <> "") {
	$order_list->lStopRec = $order_list->lTotalRecs;
} else {
	$order_list->lStopRec = $order_list->lStartRec + $order_list->lDisplayRecs - 1; // Set the last record to display
}
$order_list->lRecCount = $order_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $order_list->lStartRec > 1)
		$rs->Move($order_list->lStartRec - 1);
}

// Initialize aggregate
$order->RowType = EW_ROWTYPE_AGGREGATEINIT;
$order_list->RenderRow();
$order_list->lRowCnt = 0;
while (($order->CurrentAction == "gridadd" || !$rs->EOF) &&
	$order_list->lRecCount < $order_list->lStopRec) {
	$order_list->lRecCount++;
	if (intval($order_list->lRecCount) >= intval($order_list->lStartRec)) {
		$order_list->lRowCnt++;

	// Init row class and style
	$order->CssClass = "";
	$order->CssStyle = "";
	$order->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($order->CurrentAction == "gridadd") {
		$order_list->LoadDefaultValues(); // Load default values
	} else {
		$order_list->LoadRowValues($rs); // Load row values
	}
	$order->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$order_list->RenderRow();

	// Render list options
	$order_list->RenderListOptions();
?>
	<tr<?php echo $order->RowAttributes() ?>>
<?php

// Render list options (body, left)
$order_list->ListOptions->Render("body", "left");
?>
	<?php if ($order->orderid->Visible) { // orderid ?>
		<td<?php echo $order->orderid->CellAttributes() ?>>
<div<?php echo $order->orderid->ViewAttributes() ?>><?php echo $order->orderid->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($order->bookid->Visible) { // bookid ?>
		<td<?php echo $order->bookid->CellAttributes() ?>>
<div<?php echo $order->bookid->ViewAttributes() ?>><?php echo $order->bookid->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($order->orderstatus->Visible) { // orderstatus ?>
		<td<?php echo $order->orderstatus->CellAttributes() ?>>
<div<?php echo $order->orderstatus->ViewAttributes() ?>><?php echo $order->orderstatus->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($order->zemail->Visible) { // email ?>
		<td<?php echo $order->zemail->CellAttributes() ?>>
<div<?php echo $order->zemail->ViewAttributes() ?>><?php echo $order->zemail->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($order->datatime->Visible) { // datatime ?>
		<td<?php echo $order->datatime->CellAttributes() ?>>
<div<?php echo $order->datatime->ViewAttributes() ?>><?php echo $order->datatime->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$order_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($order->CurrentAction <> "gridadd")
		$rs->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($rs)
	$rs->Close();
?>
<?php if ($order->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($order->CurrentAction <> "gridadd" && $order->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($order_list->Pager)) $order_list->Pager = new cPrevNextPager($order_list->lStartRec, $order_list->lDisplayRecs, $order_list->lTotalRecs) ?>
<?php if ($order_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($order_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $order_list->PageUrl() ?>start=<?php echo $order_list->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($order_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $order_list->PageUrl() ?>start=<?php echo $order_list->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $order_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($order_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $order_list->PageUrl() ?>start=<?php echo $order_list->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($order_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $order_list->PageUrl() ?>start=<?php echo $order_list->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $order_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="phpmaker"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $order_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $order_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $order_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($order_list->sSrchWhere == "0=101") { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("EnterSearchCriteria") ?></span>
	<?php } else { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("NoRecord") ?></span>
	<?php } ?>
<?php } ?>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($order_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->IsLoggedIn()) { ?>
<a href="<?php echo $order_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
</td></tr></table>
<?php if ($order->Export == "" && $order->CurrentAction == "") { ?>
<?php } ?>
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
$order_list->Page_Terminate();
?>
<?php

//
// Page class
//
class corder_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'order';

	// Page object name
	var $PageObjName = 'order_list';

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
	function corder_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (order)
		$GLOBALS["order"] = new corder();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["order"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "orderdelete.php";
		$this->MultiUpdateUrl = "orderupdate.php";

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'order', TRUE);

		// Start timer
		$GLOBALS["gsTimer"] = new cTimer();

		// Open connection
		$conn = ew_Connect();

		// List options
		$this->ListOptions = new cListOptions();
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

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$order->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$order->Export = $_POST["exporttype"];
		} else {
			$order->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $order->Export; // Get export parameter, used in header
		$gsExportFile = $order->TableVar; // Get export file, used in header

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

	// Class variables
	var $ListOptions; // List options
	var $lDisplayRecs = 20;
	var $lStartRec;
	var $lStopRec;
	var $lTotalRecs = 0;
	var $lRecRange = 10;
	var $sSrchWhere = ""; // Search WHERE clause
	var $lRecCnt = 0; // Record count
	var $lEditRowCnt;
	var $lRowCnt;
	var $lRowIndex; // Row index
	var $lRecPerRow = 0;
	var $lColCnt = 0;
	var $sDbMasterFilter = ""; // Master filter
	var $sDbDetailFilter = ""; // Detail filter
	var $bMasterRecordExists;	
	var $sMultiSelectKey;
	var $RestoreSearch;

	//
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsSearchError, $Security, $order;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Set up list options
			$this->SetupListOptions();

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$order->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($order->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $order->getRecordsPerPage(); // Restore from Session
		} else {
			$this->lDisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		if ($sSrchAdvanced <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "(" . $this->sSrchWhere . ") AND (" . $sSrchAdvanced . ")" : $sSrchAdvanced;
		if ($sSrchBasic <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "(" . $this->sSrchWhere . ") AND (" . $sSrchBasic. ")" : $sSrchBasic;

		// Call Recordset_Searching event
		$order->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$order->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$order->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $order->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "(" . $sFilter . ") AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "(" . $sFilter . ") AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in session
		$order->setSessionWhere($sFilter);
		$order->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $order;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $order->zemail, $Keyword);
		return $sWhere;
	}

	// Build basic search SQL
	function BuildBasicSearchSql(&$Where, &$Fld, $Keyword) {
		$sFldExpression = ($Fld->FldVirtualExpression <> "") ? $Fld->FldVirtualExpression : $Fld->FldExpression;
		$lFldDataType = ($Fld->FldIsVirtual) ? EW_DATATYPE_STRING : $Fld->FldDataType;
		if ($lFldDataType == EW_DATATYPE_NUMBER) {
			$sWrk = $sFldExpression . " = " . ew_QuotedValue($Keyword, $lFldDataType);
		} else {
			$sWrk = $sFldExpression . " LIKE " . ew_QuotedValue("%" . $Keyword . "%", $lFldDataType);
		}
		if ($Where <> "") $Where .= " OR ";
		$Where .= $sWrk;
	}

	// Return basic search WHERE clause based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $order;
		$sSearchStr = "";
		$sSearchKeyword = $order->BasicSearchKeyword;
		$sSearchType = $order->BasicSearchType;
		if ($sSearchKeyword <> "") {
			$sSearch = trim($sSearchKeyword);
			if ($sSearchType <> "") {
				while (strpos($sSearch, "  ") !== FALSE)
					$sSearch = str_replace("  ", " ", $sSearch);
				$arKeyword = explode(" ", trim($sSearch));
				foreach ($arKeyword as $sKeyword) {
					if ($sSearchStr <> "") $sSearchStr .= " " . $sSearchType . " ";
					$sSearchStr .= "(" . $this->BasicSearchSQL($sKeyword) . ")";
				}
			} else {
				$sSearchStr = $this->BasicSearchSQL($sSearch);
			}
		}
		if ($sSearchKeyword <> "") {
			$order->setSessionBasicSearchKeyword($sSearchKeyword);
			$order->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $order;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$order->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $order;
		$order->setSessionBasicSearchKeyword("");
		$order->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $order;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$order->BasicSearchKeyword = $order->getSessionBasicSearchKeyword();
			$order->BasicSearchType = $order->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $order;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$order->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$order->CurrentOrderType = @$_GET["ordertype"];
			$order->UpdateSort($order->orderid); // orderid
			$order->UpdateSort($order->bookid); // bookid
			$order->UpdateSort($order->orderstatus); // orderstatus
			$order->UpdateSort($order->zemail); // email
			$order->UpdateSort($order->datatime); // datatime
			$order->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $order;
		$sOrderBy = $order->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($order->SqlOrderBy() <> "") {
				$sOrderBy = $order->SqlOrderBy();
				$order->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $order;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$order->setSessionOrderBy($sOrderBy);
				$order->orderid->setSort("");
				$order->bookid->setSort("");
				$order->orderstatus->setSort("");
				$order->zemail->setSort("");
				$order->datatime->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$order->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $order;

		// "view"
		$this->ListOptions->Add("view");
		$item =& $this->ListOptions->Items["view"];
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->IsLoggedIn();
		$item->OnLeft = FALSE;

		// "edit"
		$this->ListOptions->Add("edit");
		$item =& $this->ListOptions->Items["edit"];
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->IsLoggedIn();
		$item->OnLeft = FALSE;

		// "copy"
		$this->ListOptions->Add("copy");
		$item =& $this->ListOptions->Items["copy"];
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->IsLoggedIn();
		$item->OnLeft = FALSE;

		// "delete"
		$this->ListOptions->Add("delete");
		$item =& $this->ListOptions->Items["delete"];
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->IsLoggedIn();
		$item->OnLeft = FALSE;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		if ($order->Export <> "" ||
			$order->CurrentAction == "gridadd" ||
			$order->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $order;
		$this->ListOptions->LoadDefault();

		// "view"
		$oListOpt =& $this->ListOptions->Items["view"];
		if ($Security->IsLoggedIn() && $oListOpt->Visible)
			$oListOpt->Body = "<a href=\"" . $this->ViewUrl . "\">" . $Language->Phrase("ViewLink") . "</a>";

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->IsLoggedIn() && $oListOpt->Visible) {
			$oListOpt->Body = "<a href=\"" . $this->EditUrl . "\">" . $Language->Phrase("EditLink") . "</a>";
		}

		// "copy"
		$oListOpt =& $this->ListOptions->Items["copy"];
		if ($Security->IsLoggedIn() && $oListOpt->Visible) {
			$oListOpt->Body = "<a href=\"" . $this->CopyUrl . "\">" . $Language->Phrase("CopyLink") . "</a>";
		}

		// "delete"
		$oListOpt =& $this->ListOptions->Items["delete"];
		if ($Security->IsLoggedIn() && $oListOpt->Visible)
			$oListOpt->Body = "<a" . "" . " href=\"" . $this->DeleteUrl . "\">" . $Language->Phrase("DeleteLink") . "</a>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $order;
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

	// Load basic search values
	function LoadBasicSearchValues() {
		global $order;
		$order->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$order->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $order;

		// Call Recordset Selecting event
		$order->Recordset_Selecting($order->CurrentFilter);

		// Load List page SQL
		$sSql = $order->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$order->Recordset_Selected($rs);
		return $rs;
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
		$this->ViewUrl = $order->ViewUrl();
		$this->EditUrl = $order->EditUrl();
		$this->InlineEditUrl = $order->InlineEditUrl();
		$this->CopyUrl = $order->CopyUrl();
		$this->InlineCopyUrl = $order->InlineCopyUrl();
		$this->DeleteUrl = $order->DeleteUrl();

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

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}

	// ListOptions Load event
	function ListOptions_Load() {

		// Example: 
		//$this->ListOptions->Add("new");
		//$this->ListOptions->Items["new"]->OnLeft = TRUE; // Link on left
		//$this->ListOptions->MoveItem("new", 0); // Move to first column

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example: 
		//$this->ListOptions->Items["new"]->Body = "xxx";

	}
}
?>
