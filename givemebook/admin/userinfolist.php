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
$userinfo_list = new cuserinfo_list();
$Page =& $userinfo_list;

// Page init
$userinfo_list->Page_Init();

// Page main
$userinfo_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($userinfo->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var userinfo_list = new ew_Page("userinfo_list");

// page properties
userinfo_list.PageID = "list"; // page ID
userinfo_list.FormID = "fuserinfolist"; // form ID
var EW_PAGE_ID = userinfo_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
userinfo_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
userinfo_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
userinfo_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($userinfo->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$userinfo_list->lTotalRecs = $userinfo->SelectRecordCount();
	} else {
		if ($rs = $userinfo_list->LoadRecordset())
			$userinfo_list->lTotalRecs = $rs->RecordCount();
	}
	$userinfo_list->lStartRec = 1;
	if ($userinfo_list->lDisplayRecs <= 0 || ($userinfo->Export <> "" && $userinfo->ExportAll)) // Display all records
		$userinfo_list->lDisplayRecs = $userinfo_list->lTotalRecs;
	if (!($userinfo->Export <> "" && $userinfo->ExportAll))
		$userinfo_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $userinfo_list->LoadRecordset($userinfo_list->lStartRec-1, $userinfo_list->lDisplayRecs);
?>
<p><span class="phpmaker" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $userinfo->TableCaption() ?>
</span></p>
<?php if ($Security->IsLoggedIn()) { ?>
<?php if ($userinfo->Export == "" && $userinfo->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(userinfo_list);" style="text-decoration: none;"><img id="userinfo_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="userinfo_list_SearchPanel">
<form name="fuserinfolistsrch" id="fuserinfolistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="userinfo">
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($userinfo->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $userinfo_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($userinfo->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($userinfo->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($userinfo->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$userinfo_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<form name="fuserinfolist" id="fuserinfolist" class="ewForm" action="" method="post">
<div id="gmp_userinfo" class="ewGridMiddlePanel">
<?php if ($userinfo_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $userinfo->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$userinfo_list->RenderListOptions();

// Render list options (header, left)
$userinfo_list->ListOptions->Render("header", "left");
?>
<?php if ($userinfo->zuserid->Visible) { // userid ?>
	<?php if ($userinfo->SortUrl($userinfo->zuserid) == "") { ?>
		<td><?php echo $userinfo->zuserid->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $userinfo->SortUrl($userinfo->zuserid) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $userinfo->zuserid->FldCaption() ?></td><td style="width: 10px;"><?php if ($userinfo->zuserid->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($userinfo->zuserid->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($userinfo->zemail->Visible) { // email ?>
	<?php if ($userinfo->SortUrl($userinfo->zemail) == "") { ?>
		<td><?php echo $userinfo->zemail->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $userinfo->SortUrl($userinfo->zemail) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $userinfo->zemail->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($userinfo->zemail->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($userinfo->zemail->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($userinfo->firstname->Visible) { // firstname ?>
	<?php if ($userinfo->SortUrl($userinfo->firstname) == "") { ?>
		<td><?php echo $userinfo->firstname->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $userinfo->SortUrl($userinfo->firstname) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $userinfo->firstname->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($userinfo->firstname->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($userinfo->firstname->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($userinfo->lastname->Visible) { // lastname ?>
	<?php if ($userinfo->SortUrl($userinfo->lastname) == "") { ?>
		<td><?php echo $userinfo->lastname->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $userinfo->SortUrl($userinfo->lastname) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $userinfo->lastname->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($userinfo->lastname->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($userinfo->lastname->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($userinfo->password->Visible) { // password ?>
	<?php if ($userinfo->SortUrl($userinfo->password) == "") { ?>
		<td><?php echo $userinfo->password->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $userinfo->SortUrl($userinfo->password) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $userinfo->password->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($userinfo->password->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($userinfo->password->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($userinfo->facebook->Visible) { // facebook ?>
	<?php if ($userinfo->SortUrl($userinfo->facebook) == "") { ?>
		<td><?php echo $userinfo->facebook->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $userinfo->SortUrl($userinfo->facebook) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $userinfo->facebook->FldCaption() ?></td><td style="width: 10px;"><?php if ($userinfo->facebook->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($userinfo->facebook->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($userinfo->logintime->Visible) { // logintime ?>
	<?php if ($userinfo->SortUrl($userinfo->logintime) == "") { ?>
		<td><?php echo $userinfo->logintime->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $userinfo->SortUrl($userinfo->logintime) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $userinfo->logintime->FldCaption() ?></td><td style="width: 10px;"><?php if ($userinfo->logintime->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($userinfo->logintime->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($userinfo->block->Visible) { // block ?>
	<?php if ($userinfo->SortUrl($userinfo->block) == "") { ?>
		<td><?php echo $userinfo->block->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $userinfo->SortUrl($userinfo->block) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $userinfo->block->FldCaption() ?></td><td style="width: 10px;"><?php if ($userinfo->block->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($userinfo->block->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$userinfo_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($userinfo->ExportAll && $userinfo->Export <> "") {
	$userinfo_list->lStopRec = $userinfo_list->lTotalRecs;
} else {
	$userinfo_list->lStopRec = $userinfo_list->lStartRec + $userinfo_list->lDisplayRecs - 1; // Set the last record to display
}
$userinfo_list->lRecCount = $userinfo_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $userinfo_list->lStartRec > 1)
		$rs->Move($userinfo_list->lStartRec - 1);
}

// Initialize aggregate
$userinfo->RowType = EW_ROWTYPE_AGGREGATEINIT;
$userinfo_list->RenderRow();
$userinfo_list->lRowCnt = 0;
while (($userinfo->CurrentAction == "gridadd" || !$rs->EOF) &&
	$userinfo_list->lRecCount < $userinfo_list->lStopRec) {
	$userinfo_list->lRecCount++;
	if (intval($userinfo_list->lRecCount) >= intval($userinfo_list->lStartRec)) {
		$userinfo_list->lRowCnt++;

	// Init row class and style
	$userinfo->CssClass = "";
	$userinfo->CssStyle = "";
	$userinfo->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($userinfo->CurrentAction == "gridadd") {
		$userinfo_list->LoadDefaultValues(); // Load default values
	} else {
		$userinfo_list->LoadRowValues($rs); // Load row values
	}
	$userinfo->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$userinfo_list->RenderRow();

	// Render list options
	$userinfo_list->RenderListOptions();
?>
	<tr<?php echo $userinfo->RowAttributes() ?>>
<?php

// Render list options (body, left)
$userinfo_list->ListOptions->Render("body", "left");
?>
	<?php if ($userinfo->zuserid->Visible) { // userid ?>
		<td<?php echo $userinfo->zuserid->CellAttributes() ?>>
<div<?php echo $userinfo->zuserid->ViewAttributes() ?>><?php echo $userinfo->zuserid->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($userinfo->zemail->Visible) { // email ?>
		<td<?php echo $userinfo->zemail->CellAttributes() ?>>
<div<?php echo $userinfo->zemail->ViewAttributes() ?>><?php echo $userinfo->zemail->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($userinfo->firstname->Visible) { // firstname ?>
		<td<?php echo $userinfo->firstname->CellAttributes() ?>>
<div<?php echo $userinfo->firstname->ViewAttributes() ?>><?php echo $userinfo->firstname->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($userinfo->lastname->Visible) { // lastname ?>
		<td<?php echo $userinfo->lastname->CellAttributes() ?>>
<div<?php echo $userinfo->lastname->ViewAttributes() ?>><?php echo $userinfo->lastname->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($userinfo->password->Visible) { // password ?>
		<td<?php echo $userinfo->password->CellAttributes() ?>>
<div<?php echo $userinfo->password->ViewAttributes() ?>><?php echo $userinfo->password->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($userinfo->facebook->Visible) { // facebook ?>
		<td<?php echo $userinfo->facebook->CellAttributes() ?>>
<div<?php echo $userinfo->facebook->ViewAttributes() ?>><?php echo $userinfo->facebook->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($userinfo->logintime->Visible) { // logintime ?>
		<td<?php echo $userinfo->logintime->CellAttributes() ?>>
<div<?php echo $userinfo->logintime->ViewAttributes() ?>><?php echo $userinfo->logintime->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($userinfo->block->Visible) { // block ?>
		<td<?php echo $userinfo->block->CellAttributes() ?>>
<div<?php echo $userinfo->block->ViewAttributes() ?>><?php echo $userinfo->block->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$userinfo_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($userinfo->CurrentAction <> "gridadd")
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
<?php if ($userinfo->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($userinfo->CurrentAction <> "gridadd" && $userinfo->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($userinfo_list->Pager)) $userinfo_list->Pager = new cPrevNextPager($userinfo_list->lStartRec, $userinfo_list->lDisplayRecs, $userinfo_list->lTotalRecs) ?>
<?php if ($userinfo_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($userinfo_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $userinfo_list->PageUrl() ?>start=<?php echo $userinfo_list->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($userinfo_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $userinfo_list->PageUrl() ?>start=<?php echo $userinfo_list->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $userinfo_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($userinfo_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $userinfo_list->PageUrl() ?>start=<?php echo $userinfo_list->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($userinfo_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $userinfo_list->PageUrl() ?>start=<?php echo $userinfo_list->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $userinfo_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="phpmaker"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $userinfo_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $userinfo_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $userinfo_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($userinfo_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($userinfo_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->IsLoggedIn()) { ?>
<a href="<?php echo $userinfo_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
</td></tr></table>
<?php if ($userinfo->Export == "" && $userinfo->CurrentAction == "") { ?>
<?php } ?>
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
$userinfo_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cuserinfo_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'userinfo';

	// Page object name
	var $PageObjName = 'userinfo_list';

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
	function cuserinfo_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (userinfo)
		$GLOBALS["userinfo"] = new cuserinfo();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["userinfo"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "userinfodelete.php";
		$this->MultiUpdateUrl = "userinfoupdate.php";

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'userinfo', TRUE);

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
		global $userinfo;

		// Security
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$userinfo->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$userinfo->Export = $_POST["exporttype"];
		} else {
			$userinfo->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $userinfo->Export; // Get export parameter, used in header
		$gsExportFile = $userinfo->TableVar; // Get export file, used in header

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
		global $objForm, $Language, $gsSearchError, $Security, $userinfo;

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
			$userinfo->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($userinfo->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $userinfo->getRecordsPerPage(); // Restore from Session
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
		$userinfo->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$userinfo->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$userinfo->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $userinfo->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "(" . $sFilter . ") AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "(" . $sFilter . ") AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in session
		$userinfo->setSessionWhere($sFilter);
		$userinfo->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $userinfo;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $userinfo->zemail, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $userinfo->firstname, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $userinfo->lastname, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $userinfo->password, $Keyword);
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
		global $Security, $userinfo;
		$sSearchStr = "";
		$sSearchKeyword = $userinfo->BasicSearchKeyword;
		$sSearchType = $userinfo->BasicSearchType;
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
			$userinfo->setSessionBasicSearchKeyword($sSearchKeyword);
			$userinfo->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $userinfo;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$userinfo->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $userinfo;
		$userinfo->setSessionBasicSearchKeyword("");
		$userinfo->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $userinfo;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$userinfo->BasicSearchKeyword = $userinfo->getSessionBasicSearchKeyword();
			$userinfo->BasicSearchType = $userinfo->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $userinfo;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$userinfo->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$userinfo->CurrentOrderType = @$_GET["ordertype"];
			$userinfo->UpdateSort($userinfo->zuserid); // userid
			$userinfo->UpdateSort($userinfo->zemail); // email
			$userinfo->UpdateSort($userinfo->firstname); // firstname
			$userinfo->UpdateSort($userinfo->lastname); // lastname
			$userinfo->UpdateSort($userinfo->password); // password
			$userinfo->UpdateSort($userinfo->facebook); // facebook
			$userinfo->UpdateSort($userinfo->logintime); // logintime
			$userinfo->UpdateSort($userinfo->block); // block
			$userinfo->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $userinfo;
		$sOrderBy = $userinfo->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($userinfo->SqlOrderBy() <> "") {
				$sOrderBy = $userinfo->SqlOrderBy();
				$userinfo->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $userinfo;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$userinfo->setSessionOrderBy($sOrderBy);
				$userinfo->zuserid->setSort("");
				$userinfo->zemail->setSort("");
				$userinfo->firstname->setSort("");
				$userinfo->lastname->setSort("");
				$userinfo->password->setSort("");
				$userinfo->facebook->setSort("");
				$userinfo->logintime->setSort("");
				$userinfo->block->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$userinfo->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $userinfo;

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
		if ($userinfo->Export <> "" ||
			$userinfo->CurrentAction == "gridadd" ||
			$userinfo->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $userinfo;
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
		global $Security, $Language, $userinfo;
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

	// Load basic search values
	function LoadBasicSearchValues() {
		global $userinfo;
		$userinfo->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$userinfo->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $userinfo;

		// Call Recordset Selecting event
		$userinfo->Recordset_Selecting($userinfo->CurrentFilter);

		// Load List page SQL
		$sSql = $userinfo->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$userinfo->Recordset_Selected($rs);
		return $rs;
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
		$this->ViewUrl = $userinfo->ViewUrl();
		$this->EditUrl = $userinfo->EditUrl();
		$this->InlineEditUrl = $userinfo->InlineEditUrl();
		$this->CopyUrl = $userinfo->CopyUrl();
		$this->InlineCopyUrl = $userinfo->InlineCopyUrl();
		$this->DeleteUrl = $userinfo->DeleteUrl();

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
