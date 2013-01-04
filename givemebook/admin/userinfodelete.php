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
$userinfo_delete = new cuserinfo_delete();
$Page =& $userinfo_delete;

// Page init
$userinfo_delete->Page_Init();

// Page main
$userinfo_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var userinfo_delete = new ew_Page("userinfo_delete");

// page properties
userinfo_delete.PageID = "delete"; // page ID
userinfo_delete.FormID = "fuserinfodelete"; // form ID
var EW_PAGE_ID = userinfo_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
userinfo_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
userinfo_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
userinfo_delete.ValidateRequired = false; // no JavaScript validation
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
if ($rs = $userinfo_delete->LoadRecordset())
	$userinfo_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($userinfo_deletelTotalRecs <= 0) { // No record found, exit
	if ($rs)
		$rs->Close();
	$userinfo_delete->Page_Terminate("userinfolist.php"); // Return to list
}
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $userinfo->TableCaption() ?><br><br>
<a href="<?php echo $userinfo->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$userinfo_delete->ShowMessage();
?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="userinfo">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($userinfo_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $userinfo->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top"><?php echo $userinfo->zuserid->FldCaption() ?></td>
		<td valign="top"><?php echo $userinfo->zemail->FldCaption() ?></td>
		<td valign="top"><?php echo $userinfo->firstname->FldCaption() ?></td>
		<td valign="top"><?php echo $userinfo->lastname->FldCaption() ?></td>
		<td valign="top"><?php echo $userinfo->password->FldCaption() ?></td>
		<td valign="top"><?php echo $userinfo->facebook->FldCaption() ?></td>
		<td valign="top"><?php echo $userinfo->logintime->FldCaption() ?></td>
		<td valign="top"><?php echo $userinfo->block->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$userinfo_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$userinfo_delete->lRecCnt++;

	// Set row properties
	$userinfo->CssClass = "";
	$userinfo->CssStyle = "";
	$userinfo->RowAttrs = array();
	$userinfo->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$userinfo_delete->LoadRowValues($rs);

	// Render row
	$userinfo_delete->RenderRow();
?>
	<tr<?php echo $userinfo->RowAttributes() ?>>
		<td<?php echo $userinfo->zuserid->CellAttributes() ?>>
<div<?php echo $userinfo->zuserid->ViewAttributes() ?>><?php echo $userinfo->zuserid->ListViewValue() ?></div></td>
		<td<?php echo $userinfo->zemail->CellAttributes() ?>>
<div<?php echo $userinfo->zemail->ViewAttributes() ?>><?php echo $userinfo->zemail->ListViewValue() ?></div></td>
		<td<?php echo $userinfo->firstname->CellAttributes() ?>>
<div<?php echo $userinfo->firstname->ViewAttributes() ?>><?php echo $userinfo->firstname->ListViewValue() ?></div></td>
		<td<?php echo $userinfo->lastname->CellAttributes() ?>>
<div<?php echo $userinfo->lastname->ViewAttributes() ?>><?php echo $userinfo->lastname->ListViewValue() ?></div></td>
		<td<?php echo $userinfo->password->CellAttributes() ?>>
<div<?php echo $userinfo->password->ViewAttributes() ?>><?php echo $userinfo->password->ListViewValue() ?></div></td>
		<td<?php echo $userinfo->facebook->CellAttributes() ?>>
<div<?php echo $userinfo->facebook->ViewAttributes() ?>><?php echo $userinfo->facebook->ListViewValue() ?></div></td>
		<td<?php echo $userinfo->logintime->CellAttributes() ?>>
<div<?php echo $userinfo->logintime->ViewAttributes() ?>><?php echo $userinfo->logintime->ListViewValue() ?></div></td>
		<td<?php echo $userinfo->block->CellAttributes() ?>>
<div<?php echo $userinfo->block->ViewAttributes() ?>><?php echo $userinfo->block->ListViewValue() ?></div></td>
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
$userinfo_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cuserinfo_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'userinfo';

	// Page object name
	var $PageObjName = 'userinfo_delete';

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
	function cuserinfo_delete() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (userinfo)
		$GLOBALS["userinfo"] = new cuserinfo();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

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
	var $lTotalRecs = 0;
	var $lRecCnt;
	var $arRecKeys = array();

	//
	// Page main
	//
	function Page_Main() {
		global $Language, $userinfo;

		// Load key parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["zuserid"] <> "") {
			$userinfo->zuserid->setQueryStringValue($_GET["zuserid"]);
			if (!is_numeric($userinfo->zuserid->QueryStringValue))
				$this->Page_Terminate("userinfolist.php"); // Prevent SQL injection, exit
			$sKey .= $userinfo->zuserid->QueryStringValue;
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
			$this->Page_Terminate("userinfolist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("userinfolist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`userid`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in userinfo class, userinfoinfo.php

		$userinfo->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$userinfo->CurrentAction = $_POST["a_delete"];
		} else {
			$userinfo->CurrentAction = "I"; // Display record
		}
		switch ($userinfo->CurrentAction) {
			case "D": // Delete
				$userinfo->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($userinfo->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $userinfo;
		$DeleteRows = TRUE;
		$sWrkFilter = $userinfo->CurrentFilter;

		// Set up filter (SQL WHERE clause) and get return SQL
		// SQL constructor in userinfo class, userinfoinfo.php

		$userinfo->CurrentFilter = $sWrkFilter;
		$sSql = $userinfo->SQL();
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
				$DeleteRows = $userinfo->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['userid'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($userinfo->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($userinfo->CancelMessage <> "") {
				$this->setMessage($userinfo->CancelMessage);
				$userinfo->CancelMessage = "";
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
				$userinfo->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
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
