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
$bookpost_delete = new cbookpost_delete();
$Page =& $bookpost_delete;

// Page init
$bookpost_delete->Page_Init();

// Page main
$bookpost_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var bookpost_delete = new ew_Page("bookpost_delete");

// page properties
bookpost_delete.PageID = "delete"; // page ID
bookpost_delete.FormID = "fbookpostdelete"; // form ID
var EW_PAGE_ID = bookpost_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
bookpost_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
bookpost_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
bookpost_delete.ValidateRequired = false; // no JavaScript validation
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
<?php

// Load records for display
if ($rs = $bookpost_delete->LoadRecordset())
	$bookpost_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($bookpost_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$bookpost_delete->Page_Terminate("bookpostlist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $bookpost->TableCaption() ?><br><br>
<a href="<?php echo $bookpost->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$bookpost_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="bookpost">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($bookpost_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $bookpost->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $bookpost->bookid->FldCaption() ?></td>
		<td valign="top"><?php echo $bookpost->name->FldCaption() ?></td>
		<td valign="top"><?php echo $bookpost->cata->FldCaption() ?></td>
		<td valign="top"><?php echo $bookpost->author->FldCaption() ?></td>
		<td valign="top"><?php echo $bookpost->publisher->FldCaption() ?></td>
		<td valign="top"><?php echo $bookpost->code->FldCaption() ?></td>
		<td valign="top"><?php echo $bookpost->pic->FldCaption() ?></td>
		<td valign="top"><?php echo $bookpost->useremail->FldCaption() ?></td>
		<td valign="top"><?php echo $bookpost->price->FldCaption() ?></td>
		<td valign="top"><?php echo $bookpost->datatime->FldCaption() ?></td>
		<td valign="top"><?php echo $bookpost->hidden->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$bookpost_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$bookpost_delete->lRecCnt++;

	// Set row properties
	$bookpost->CssClass = "";
	$bookpost->CssStyle = "";
	$bookpost->RowAttrs = array();
	$bookpost->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$bookpost_delete->LoadRowValues($rs);

	// Render row
	$bookpost_delete->RenderRow();
?>
	<tr<?php echo $bookpost->RowAttributes() ?>>
		<td<?php echo $bookpost->bookid->CellAttributes() ?>>
<div<?php echo $bookpost->bookid->ViewAttributes() ?>><?php echo $bookpost->bookid->ListViewValue() ?></div></td>
		<td<?php echo $bookpost->name->CellAttributes() ?>>
<div<?php echo $bookpost->name->ViewAttributes() ?>><?php echo $bookpost->name->ListViewValue() ?></div></td>
		<td<?php echo $bookpost->cata->CellAttributes() ?>>
<div<?php echo $bookpost->cata->ViewAttributes() ?>><?php echo $bookpost->cata->ListViewValue() ?></div></td>
		<td<?php echo $bookpost->author->CellAttributes() ?>>
<div<?php echo $bookpost->author->ViewAttributes() ?>><?php echo $bookpost->author->ListViewValue() ?></div></td>
		<td<?php echo $bookpost->publisher->CellAttributes() ?>>
<div<?php echo $bookpost->publisher->ViewAttributes() ?>><?php echo $bookpost->publisher->ListViewValue() ?></div></td>
		<td<?php echo $bookpost->code->CellAttributes() ?>>
<div<?php echo $bookpost->code->ViewAttributes() ?>><?php echo $bookpost->code->ListViewValue() ?></div></td>
		<td<?php echo $bookpost->pic->CellAttributes() ?>>
<div<?php echo $bookpost->pic->ViewAttributes() ?>><?php echo $bookpost->pic->ListViewValue() ?></div></td>
		<td<?php echo $bookpost->useremail->CellAttributes() ?>>
<div<?php echo $bookpost->useremail->ViewAttributes() ?>><?php echo $bookpost->useremail->ListViewValue() ?></div></td>
		<td<?php echo $bookpost->price->CellAttributes() ?>>
<div<?php echo $bookpost->price->ViewAttributes() ?>><?php echo $bookpost->price->ListViewValue() ?></div></td>
		<td<?php echo $bookpost->datatime->CellAttributes() ?>>
<div<?php echo $bookpost->datatime->ViewAttributes() ?>><?php echo $bookpost->datatime->ListViewValue() ?></div></td>
		<td<?php echo $bookpost->hidden->CellAttributes() ?>>
<div<?php echo $bookpost->hidden->ViewAttributes() ?>><?php echo $bookpost->hidden->ListViewValue() ?></div></td>
	</tr>
<?php
	$rs->MoveNext();
}
$rs->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo ew_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$bookpost_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cbookpost_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'bookpost';

	// Page object name
	var $PageObjName = 'bookpost_delete';

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
	function cbookpost_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (bookpost)
		$GLOBALS["bookpost"] = new cbookpost();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

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
	var $lTotalRecs = 0;
	var $lRecCnt;
	var $arRecKeys = array();

	//
	// Page main
	//
	function Page_Main() {
		global $Language, $bookpost;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["bookid"] <> "") {
			$bookpost->bookid->setQueryStringValue($_GET["bookid"]);
			if (!is_numeric($bookpost->bookid->QueryStringValue))
				$this->Page_Terminate("bookpostlist.php"); // Prevent SQL injection, exit
			$sKey .= $bookpost->bookid->QueryStringValue;
		} else {
			$bSingleDelete = FALSE;
		}
		if ($bSingleDelete) {
			$nKeySelected = 1; // Set up key selected count
			$this->arRecKeys[0] = $sKey;
		} else {
			if (isset($_POST["key_m"])) { // Key in form
				$nKeySelected = count($_POST["key_m"]); // Set up key selected count
				$this->arRecKeys = ew_StripSlashes($_POST["key_m"]);
			}
		}
		if ($nKeySelected <= 0)
			$this->Page_Terminate("bookpostlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("bookpostlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`bookid`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in bookpost class, bookpostinfo.php

		$bookpost->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$bookpost->CurrentAction = $_POST["a_delete"];
		} else {
			$bookpost->CurrentAction = "I"; // Display record
		}
		switch ($bookpost->CurrentAction) {
			case "D": // Delete
				$bookpost->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($bookpost->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $bookpost;
		$DeleteRows = TRUE;
		$sWrkFilter = $bookpost->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in bookpost class, bookpostinfo.php

		$bookpost->CurrentFilter = $sWrkFilter;
		$sSql = $bookpost->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setMessage($Language->Phrase("NoRecord")); // No record found
			$rs->Close();
			return FALSE;
		}
		$conn->BeginTrans();

		// Clone old rows
		$rsold = ($rs) ? $rs->GetRows() : array();
		if ($rs)
			$rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $bookpost->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['bookid'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($bookpost->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($bookpost->CancelMessage <> "") {
				$this->setMessage($bookpost->CancelMessage);
				$bookpost->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("DeleteCancelled"));
			}
		}
		if ($DeleteRows) {
			$conn->CommitTrans(); // Commit the changes
		} else {
			$conn->RollbackTrans(); // Rollback changes
		}

		// Call Row Deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$bookpost->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
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
}
?>
