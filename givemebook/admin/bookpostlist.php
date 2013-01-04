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

echo "<br><a href=\"../makesearch.php\">Generator Typeahead</a>";
// Create page object
$bookpost_list = new cbookpost_list();
$Page =& $bookpost_list;

// Page init
$bookpost_list->Page_Init();

// Page main
$bookpost_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($bookpost->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var bookpost_list = new ew_Page("bookpost_list");

// page properties
bookpost_list.PageID = "list"; // page ID
bookpost_list.FormID = "fbookpostlist"; // form ID
var EW_PAGE_ID = bookpost_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
bookpost_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
bookpost_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
bookpost_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($bookpost->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$bookpost_list->lTotalRecs = $bookpost->SelectRecordCount();
	} else {
		if ($rs = $bookpost_list->LoadRecordset())
			$bookpost_list->lTotalRecs = $rs->RecordCount();
	}
	$bookpost_list->lStartRec = 1;
	if ($bookpost_list->lDisplayRecs <= 0 || ($bookpost->Export <> "" && $bookpost->ExportAll)) // Display all records
		$bookpost_list->lDisplayRecs = $bookpost_list->lTotalRecs;
	if (!($bookpost->Export <> "" && $bookpost->ExportAll))
		$bookpost_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $bookpost_list->LoadRecordset($bookpost_list->lStartRec-1, $bookpost_list->lDisplayRecs);
?>
<p><span class="phpmaker" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $bookpost->TableCaption() ?>
</span></p>
<?php if ($Security->IsLoggedIn()) { ?>
<?php if ($bookpost->Export == "" && $bookpost->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(bookpost_list);" style="text-decoration: none;"><img id="bookpost_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="bookpost_list_SearchPanel">
<form name="fbookpostlistsrch" id="fbookpostlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="bookpost">
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($bookpost->getSessionBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
			<a href="<?php echo $bookpost_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($bookpost->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($bookpost->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($bookpost->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$bookpost_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<form name="fbookpostlist" id="fbookpostlist" class="ewForm" action="" method="post">
<div id="gmp_bookpost" class="ewGridMiddlePanel">
<?php if ($bookpost_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php echo $bookpost->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$bookpost_list->RenderListOptions();

// Render list options (header, left)
$bookpost_list->ListOptions->Render("header", "left");
?>
<?php if ($bookpost->bookid->Visible) { // bookid ?>
	<?php if ($bookpost->SortUrl($bookpost->bookid) == "") { ?>
		<td><?php echo $bookpost->bookid->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $bookpost->SortUrl($bookpost->bookid) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $bookpost->bookid->FldCaption() ?></td><td style="width: 10px;"><?php if ($bookpost->bookid->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($bookpost->bookid->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($bookpost->name->Visible) { // name ?>
	<?php if ($bookpost->SortUrl($bookpost->name) == "") { ?>
		<td><?php echo $bookpost->name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $bookpost->SortUrl($bookpost->name) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $bookpost->name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($bookpost->name->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($bookpost->name->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($bookpost->cata->Visible) { // cata ?>
	<?php if ($bookpost->SortUrl($bookpost->cata) == "") { ?>
		<td><?php echo $bookpost->cata->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $bookpost->SortUrl($bookpost->cata) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $bookpost->cata->FldCaption() ?></td><td style="width: 10px;"><?php if ($bookpost->cata->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($bookpost->cata->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($bookpost->author->Visible) { // author ?>
	<?php if ($bookpost->SortUrl($bookpost->author) == "") { ?>
		<td><?php echo $bookpost->author->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $bookpost->SortUrl($bookpost->author) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $bookpost->author->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($bookpost->author->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($bookpost->author->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($bookpost->publisher->Visible) { // publisher ?>
	<?php if ($bookpost->SortUrl($bookpost->publisher) == "") { ?>
		<td><?php echo $bookpost->publisher->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $bookpost->SortUrl($bookpost->publisher) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $bookpost->publisher->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($bookpost->publisher->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($bookpost->publisher->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($bookpost->code->Visible) { // code ?>
	<?php if ($bookpost->SortUrl($bookpost->code) == "") { ?>
		<td><?php echo $bookpost->code->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $bookpost->SortUrl($bookpost->code) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $bookpost->code->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($bookpost->code->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($bookpost->code->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($bookpost->pic->Visible) { // pic ?>
	<?php if ($bookpost->SortUrl($bookpost->pic) == "") { ?>
		<td><?php echo $bookpost->pic->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $bookpost->SortUrl($bookpost->pic) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $bookpost->pic->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($bookpost->pic->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($bookpost->pic->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($bookpost->useremail->Visible) { // useremail ?>
	<?php if ($bookpost->SortUrl($bookpost->useremail) == "") { ?>
		<td><?php echo $bookpost->useremail->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $bookpost->SortUrl($bookpost->useremail) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $bookpost->useremail->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($bookpost->useremail->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($bookpost->useremail->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($bookpost->price->Visible) { // price ?>
	<?php if ($bookpost->SortUrl($bookpost->price) == "") { ?>
		<td><?php echo $bookpost->price->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $bookpost->SortUrl($bookpost->price) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $bookpost->price->FldCaption() ?></td><td style="width: 10px;"><?php if ($bookpost->price->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($bookpost->price->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($bookpost->datatime->Visible) { // datatime ?>
	<?php if ($bookpost->SortUrl($bookpost->datatime) == "") { ?>
		<td><?php echo $bookpost->datatime->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $bookpost->SortUrl($bookpost->datatime) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $bookpost->datatime->FldCaption() ?></td><td style="width: 10px;"><?php if ($bookpost->datatime->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($bookpost->datatime->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($bookpost->hidden->Visible) { // hidden ?>
	<?php if ($bookpost->SortUrl($bookpost->hidden) == "") { ?>
		<td><?php echo $bookpost->hidden->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $bookpost->SortUrl($bookpost->hidden) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><thead><tr><td><?php echo $bookpost->hidden->FldCaption() ?></td><td style="width: 10px;"><?php if ($bookpost->hidden->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($bookpost->hidden->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$bookpost_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($bookpost->ExportAll && $bookpost->Export <> "") {
	$bookpost_list->lStopRec = $bookpost_list->lTotalRecs;
} else {
	$bookpost_list->lStopRec = $bookpost_list->lStartRec + $bookpost_list->lDisplayRecs - 1; // Set the last record to display
}
$bookpost_list->lRecCount = $bookpost_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$bSelectLimit && $bookpost_list->lStartRec > 1)
		$rs->Move($bookpost_list->lStartRec - 1);
}

// Initialize aggregate
$bookpost->RowType = EW_ROWTYPE_AGGREGATEINIT;
$bookpost_list->RenderRow();
$bookpost_list->lRowCnt = 0;
while (($bookpost->CurrentAction == "gridadd" || !$rs->EOF) &&
	$bookpost_list->lRecCount < $bookpost_list->lStopRec) {
	$bookpost_list->lRecCount++;
	if (intval($bookpost_list->lRecCount) >= intval($bookpost_list->lStartRec)) {
		$bookpost_list->lRowCnt++;

	// Init row class and style
	$bookpost->CssClass = "";
	$bookpost->CssStyle = "";
	$bookpost->RowAttrs = array('onmouseover'=>'ew_MouseOver(event, this);', 'onmouseout'=>'ew_MouseOut(event, this);', 'onclick'=>'ew_Click(event, this);');
	if ($bookpost->CurrentAction == "gridadd") {
		$bookpost_list->LoadDefaultValues(); // Load default values
	} else {
		$bookpost_list->LoadRowValues($rs); // Load row values
	}
	$bookpost->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$bookpost_list->RenderRow();

	// Render list options
	$bookpost_list->RenderListOptions();
?>
	<tr<?php echo $bookpost->RowAttributes() ?>>
<?php

// Render list options (body, left)
$bookpost_list->ListOptions->Render("body", "left");
?>
	<?php if ($bookpost->bookid->Visible) { // bookid ?>
		<td<?php echo $bookpost->bookid->CellAttributes() ?>>
<div<?php echo $bookpost->bookid->ViewAttributes() ?>><?php echo $bookpost->bookid->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($bookpost->name->Visible) { // name ?>
		<td<?php echo $bookpost->name->CellAttributes() ?>>
<div<?php echo $bookpost->name->ViewAttributes() ?>><?php echo $bookpost->name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($bookpost->cata->Visible) { // cata ?>
		<td<?php echo $bookpost->cata->CellAttributes() ?>>
<div<?php echo $bookpost->cata->ViewAttributes() ?>><?php echo $bookpost->cata->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($bookpost->author->Visible) { // author ?>
		<td<?php echo $bookpost->author->CellAttributes() ?>>
<div<?php echo $bookpost->author->ViewAttributes() ?>><?php echo $bookpost->author->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($bookpost->publisher->Visible) { // publisher ?>
		<td<?php echo $bookpost->publisher->CellAttributes() ?>>
<div<?php echo $bookpost->publisher->ViewAttributes() ?>><?php echo $bookpost->publisher->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($bookpost->code->Visible) { // code ?>
		<td<?php echo $bookpost->code->CellAttributes() ?>>
<div<?php echo $bookpost->code->ViewAttributes() ?>><?php echo $bookpost->code->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($bookpost->pic->Visible) { // pic ?>
		<td<?php echo $bookpost->pic->CellAttributes() ?>>
<div<?php echo $bookpost->pic->ViewAttributes() ?>><?php echo $bookpost->pic->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($bookpost->useremail->Visible) { // useremail ?>
		<td<?php echo $bookpost->useremail->CellAttributes() ?>>
<div<?php echo $bookpost->useremail->ViewAttributes() ?>><?php echo $bookpost->useremail->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($bookpost->price->Visible) { // price ?>
		<td<?php echo $bookpost->price->CellAttributes() ?>>
<div<?php echo $bookpost->price->ViewAttributes() ?>><?php echo $bookpost->price->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($bookpost->datatime->Visible) { // datatime ?>
		<td<?php echo $bookpost->datatime->CellAttributes() ?>>
<div<?php echo $bookpost->datatime->ViewAttributes() ?>><?php echo $bookpost->datatime->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($bookpost->hidden->Visible) { // hidden ?>
		<td<?php echo $bookpost->hidden->CellAttributes() ?>>
<div<?php echo $bookpost->hidden->ViewAttributes() ?>><?php echo $bookpost->hidden->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bookpost_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($bookpost->CurrentAction <> "gridadd")
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
<?php if ($bookpost->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($bookpost->CurrentAction <> "gridadd" && $bookpost->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($bookpost_list->Pager)) $bookpost_list->Pager = new cPrevNextPager($bookpost_list->lStartRec, $bookpost_list->lDisplayRecs, $bookpost_list->lTotalRecs) ?>
<?php if ($bookpost_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($bookpost_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $bookpost_list->PageUrl() ?>start=<?php echo $bookpost_list->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($bookpost_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $bookpost_list->PageUrl() ?>start=<?php echo $bookpost_list->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $bookpost_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($bookpost_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $bookpost_list->PageUrl() ?>start=<?php echo $bookpost_list->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($bookpost_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $bookpost_list->PageUrl() ?>start=<?php echo $bookpost_list->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $bookpost_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="phpmaker"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $bookpost_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $bookpost_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $bookpost_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($bookpost_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($bookpost_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->IsLoggedIn()) { ?>
<a href="<?php echo $bookpost_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
</td></tr></table>
<?php if ($bookpost->Export == "" && $bookpost->CurrentAction == "") { ?>
<?php } ?>
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
$bookpost_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cbookpost_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'bookpost';

	// Page object name
	var $PageObjName = 'bookpost_list';

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
	function cbookpost_list() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (bookpost)
		$GLOBALS["bookpost"] = new cbookpost();

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->AddUrl = $GLOBALS["bookpost"]->AddUrl();
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "bookpostdelete.php";
		$this->MultiUpdateUrl = "bookpostupdate.php";

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'bookpost', TRUE);

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
		global $bookpost;

		// Security
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$bookpost->Export = $_GET["export"];
		} elseif (ew_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$bookpost->Export = $_POST["exporttype"];
		} else {
			$bookpost->setExportReturnUrl(ew_CurrentUrl());
		}
		$gsExport = $bookpost->Export; // Get export parameter, used in header
		$gsExportFile = $bookpost->TableVar; // Get export file, used in header

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
		global $objForm, $Language, $gsSearchError, $Security, $bookpost;

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
			$bookpost->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($bookpost->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $bookpost->getRecordsPerPage(); // Restore from Session
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
		$bookpost->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$bookpost->setSearchWhere($this->sSrchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->lStartRec = 1; // Reset start record counter
				$bookpost->setStartRecordNumber($this->lStartRec);
			}
		} else {
			$this->sSrchWhere = $bookpost->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "(" . $sFilter . ") AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "(" . $sFilter . ") AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in session
		$bookpost->setSessionWhere($sFilter);
		$bookpost->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $bookpost;
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $bookpost->name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $bookpost->cata, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $bookpost->author, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $bookpost->publisher, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $bookpost->info, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $bookpost->code, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $bookpost->pic, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $bookpost->useremail, $Keyword);
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
		global $Security, $bookpost;
		$sSearchStr = "";
		$sSearchKeyword = $bookpost->BasicSearchKeyword;
		$sSearchType = $bookpost->BasicSearchType;
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
			$bookpost->setSessionBasicSearchKeyword($sSearchKeyword);
			$bookpost->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $bookpost;

		// Clear search WHERE clause
		$this->sSrchWhere = "";
		$bookpost->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $bookpost;
		$bookpost->setSessionBasicSearchKeyword("");
		$bookpost->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $bookpost;
		$bRestore = TRUE;
		if (@$_GET[EW_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$bookpost->BasicSearchKeyword = $bookpost->getSessionBasicSearchKeyword();
			$bookpost->BasicSearchType = $bookpost->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $bookpost;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$bookpost->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$bookpost->CurrentOrderType = @$_GET["ordertype"];
			$bookpost->UpdateSort($bookpost->bookid); // bookid
			$bookpost->UpdateSort($bookpost->name); // name
			$bookpost->UpdateSort($bookpost->cata); // cata
			$bookpost->UpdateSort($bookpost->author); // author
			$bookpost->UpdateSort($bookpost->publisher); // publisher
			$bookpost->UpdateSort($bookpost->code); // code
			$bookpost->UpdateSort($bookpost->pic); // pic
			$bookpost->UpdateSort($bookpost->useremail); // useremail
			$bookpost->UpdateSort($bookpost->price); // price
			$bookpost->UpdateSort($bookpost->datatime); // datatime
			$bookpost->UpdateSort($bookpost->hidden); // hidden
			$bookpost->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $bookpost;
		$sOrderBy = $bookpost->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($bookpost->SqlOrderBy() <> "") {
				$sOrderBy = $bookpost->SqlOrderBy();
				$bookpost->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $bookpost;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$bookpost->setSessionOrderBy($sOrderBy);
				$bookpost->bookid->setSort("");
				$bookpost->name->setSort("");
				$bookpost->cata->setSort("");
				$bookpost->author->setSort("");
				$bookpost->publisher->setSort("");
				$bookpost->code->setSort("");
				$bookpost->pic->setSort("");
				$bookpost->useremail->setSort("");
				$bookpost->price->setSort("");
				$bookpost->datatime->setSort("");
				$bookpost->hidden->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$bookpost->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $bookpost;

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
		if ($bookpost->Export <> "" ||
			$bookpost->CurrentAction == "gridadd" ||
			$bookpost->CurrentAction == "gridedit")
			$this->ListOptions->HideAllOptions();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $bookpost;
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
		global $Security, $Language, $bookpost;
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

	// Load basic search values
	function LoadBasicSearchValues() {
		global $bookpost;
		$bookpost->BasicSearchKeyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		$bookpost->BasicSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $bookpost;

		// Call Recordset Selecting event
		$bookpost->Recordset_Selecting($bookpost->CurrentFilter);

		// Load List page SQL
		$sSql = $bookpost->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$bookpost->Recordset_Selected($rs);
		return $rs;
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
		$this->ViewUrl = $bookpost->ViewUrl();
		$this->EditUrl = $bookpost->EditUrl();
		$this->InlineEditUrl = $bookpost->InlineEditUrl();
		$this->CopyUrl = $bookpost->CopyUrl();
		$this->InlineCopyUrl = $bookpost->InlineCopyUrl();
		$this->DeleteUrl = $bookpost->DeleteUrl();

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
