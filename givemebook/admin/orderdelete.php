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
$order_delete = new corder_delete();
$Page =& $order_delete;

// Page init
$order_delete->Page_Init();

// Page main
$order_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var order_delete = new ew_Page("order_delete");

// page properties
order_delete.PageID = "delete"; // page ID
order_delete.FormID = "forderdelete"; // form ID
var EW_PAGE_ID = order_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
order_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
order_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
order_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $order_delete->LoadRecordset())
	$order_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($order_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$order_delete->Page_Terminate("orderlist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $order->TableCaption() ?><br><br>
<a href="<?php echo $order->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$order_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="order">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($order_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $order->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $order->orderid->FldCaption() ?></td>
		<td valign="top"><?php echo $order->bookid->FldCaption() ?></td>
		<td valign="top"><?php echo $order->orderstatus->FldCaption() ?></td>
		<td valign="top"><?php echo $order->zemail->FldCaption() ?></td>
		<td valign="top"><?php echo $order->datatime->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$order_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$order_delete->lRecCnt++;

	// Set row properties
	$order->CssClass = "";
	$order->CssStyle = "";
	$order->RowAttrs = array();
	$order->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$order_delete->LoadRowValues($rs);

	// Render row
	$order_delete->RenderRow();
?>
	<tr<?php echo $order->RowAttributes() ?>>
		<td<?php echo $order->orderid->CellAttributes() ?>>
<div<?php echo $order->orderid->ViewAttributes() ?>><?php echo $order->orderid->ListViewValue() ?></div></td>
		<td<?php echo $order->bookid->CellAttributes() ?>>
<div<?php echo $order->bookid->ViewAttributes() ?>><?php echo $order->bookid->ListViewValue() ?></div></td>
		<td<?php echo $order->orderstatus->CellAttributes() ?>>
<div<?php echo $order->orderstatus->ViewAttributes() ?>><?php echo $order->orderstatus->ListViewValue() ?></div></td>
		<td<?php echo $order->zemail->CellAttributes() ?>>
<div<?php echo $order->zemail->ViewAttributes() ?>><?php echo $order->zemail->ListViewValue() ?></div></td>
		<td<?php echo $order->datatime->CellAttributes() ?>>
<div<?php echo $order->datatime->ViewAttributes() ?>><?php echo $order->datatime->ListViewValue() ?></div></td>
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
$order_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class corder_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'order';

	// Page object name
	var $PageObjName = 'order_delete';

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
	function corder_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (order)
		$GLOBALS["order"] = new corder();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

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
	var $lTotalRecs = 0;
	var $lRecCnt;
	var $arRecKeys = array();

	//
	// Page main
	//
	function Page_Main() {
		global $Language, $order;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["orderid"] <> "") {
			$order->orderid->setQueryStringValue($_GET["orderid"]);
			if (!is_numeric($order->orderid->QueryStringValue))
				$this->Page_Terminate("orderlist.php"); // Prevent SQL injection, exit
			$sKey .= $order->orderid->QueryStringValue;
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
			$this->Page_Terminate("orderlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("orderlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`orderid`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in order class, orderinfo.php

		$order->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$order->CurrentAction = $_POST["a_delete"];
		} else {
			$order->CurrentAction = "I"; // Display record
		}
		switch ($order->CurrentAction) {
			case "D": // Delete
				$order->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($order->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $order;
		$DeleteRows = TRUE;
		$sWrkFilter = $order->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in order class, orderinfo.php

		$order->CurrentFilter = $sWrkFilter;
		$sSql = $order->SQL();
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
				$DeleteRows = $order->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['orderid'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($order->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($order->CancelMessage <> "") {
				$this->setMessage($order->CancelMessage);
				$order->CancelMessage = "";
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
				$order->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
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
