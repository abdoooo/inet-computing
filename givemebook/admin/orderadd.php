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
$order_add = new corder_add();
$Page =& $order_add;

// Page init
$order_add->Page_Init();

// Page main
$order_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var order_add = new ew_Page("order_add");

// page properties
order_add.PageID = "add"; // page ID
order_add.FormID = "forderadd"; // form ID
var EW_PAGE_ID = order_add.PageID; // for backward compatibility

// extend page with ValidateForm function
order_add.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_bookid"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($order->bookid->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_bookid"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($order->bookid->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_orderstatus"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($order->orderstatus->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_orderstatus"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($order->orderstatus->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_zemail"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($order->zemail->FldCaption()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
order_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
order_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
order_add.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("Add") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $order->TableCaption() ?><br><br>
<a href="<?php echo $order->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$order_add->ShowMessage();
?>
<form name="forderadd" id="forderadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return order_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="order">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($order->bookid->Visible) { // bookid ?>
	<tr<?php echo $order->bookid->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $order->bookid->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $order->bookid->CellAttributes() ?>><span id="el_bookid">
<input type="text" name="x_bookid" id="x_bookid" title="<?php echo $order->bookid->FldTitle() ?>" size="30" value="<?php echo $order->bookid->EditValue ?>"<?php echo $order->bookid->EditAttributes() ?>>
</span><?php echo $order->bookid->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($order->orderstatus->Visible) { // orderstatus ?>
	<tr<?php echo $order->orderstatus->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $order->orderstatus->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $order->orderstatus->CellAttributes() ?>><span id="el_orderstatus">
<input type="text" name="x_orderstatus" id="x_orderstatus" title="<?php echo $order->orderstatus->FldTitle() ?>" size="30" value="<?php echo $order->orderstatus->EditValue ?>"<?php echo $order->orderstatus->EditAttributes() ?>>
</span><?php echo $order->orderstatus->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($order->zemail->Visible) { // email ?>
	<tr<?php echo $order->zemail->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $order->zemail->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $order->zemail->CellAttributes() ?>><span id="el_zemail">
<input type="text" name="x_zemail" id="x_zemail" title="<?php echo $order->zemail->FldTitle() ?>" size="30" maxlength="100" value="<?php echo $order->zemail->EditValue ?>"<?php echo $order->zemail->EditAttributes() ?>>
</span><?php echo $order->zemail->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo ew_BtnCaption($Language->Phrase("AddBtn")) ?>">
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php
$order_add->Page_Terminate();
?>
<?php

//
// Page class
//
class corder_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'order';

	// Page object name
	var $PageObjName = 'order_add';

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
	function corder_add() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (order)
		$GLOBALS["order"] = new corder();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

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

		// Create form object
		$objForm = new cFormObj();

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
	var $sDbMasterFilter = "";
	var $sDbDetailFilter = "";
	var $lPriv = 0;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $order;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["orderid"] != "") {
		  $order->orderid->setQueryStringValue($_GET["orderid"]);
		} else {
		  $bCopy = FALSE;
		}

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $order->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$order->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $order->CurrentAction = "C"; // Copy record
		  } else {
		    $order->CurrentAction = "I"; // Display blank record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($order->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage($Language->Phrase("NoRecord")); // No record found
		      $this->Page_Terminate("orderlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$order->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $order->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$order->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $order;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $order;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $order;
		$order->bookid->setFormValue($objForm->GetValue("x_bookid"));
		$order->orderstatus->setFormValue($objForm->GetValue("x_orderstatus"));
		$order->zemail->setFormValue($objForm->GetValue("x_zemail"));
		$order->datatime->setFormValue($objForm->GetValue("x_datatime"));
		$order->datatime->CurrentValue = ew_UnFormatDateTime($order->datatime->CurrentValue, 5);
		$order->orderid->setFormValue($objForm->GetValue("x_orderid"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $order;
		$order->orderid->CurrentValue = $order->orderid->FormValue;
		$order->bookid->CurrentValue = $order->bookid->FormValue;
		$order->orderstatus->CurrentValue = $order->orderstatus->FormValue;
		$order->zemail->CurrentValue = $order->zemail->FormValue;
		$order->datatime->CurrentValue = $order->datatime->FormValue;
		$order->datatime->CurrentValue = ew_UnFormatDateTime($order->datatime->CurrentValue, 5);
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
		} elseif ($order->RowType == EW_ROWTYPE_ADD) { // Add row

			// bookid
			$order->bookid->EditCustomAttributes = "";
			$order->bookid->EditValue = ew_HtmlEncode($order->bookid->CurrentValue);

			// orderstatus
			$order->orderstatus->EditCustomAttributes = "";
			$order->orderstatus->EditValue = ew_HtmlEncode($order->orderstatus->CurrentValue);

			// email
			$order->zemail->EditCustomAttributes = "";
			$order->zemail->EditValue = ew_HtmlEncode($order->zemail->CurrentValue);

			// datatime
		}

		// Call Row Rendered event
		if ($order->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$order->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $order;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($order->bookid->FormValue) && $order->bookid->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $order->bookid->FldCaption();
		}
		if (!ew_CheckInteger($order->bookid->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $order->bookid->FldErrMsg();
		}
		if (!is_null($order->orderstatus->FormValue) && $order->orderstatus->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $order->orderstatus->FldCaption();
		}
		if (!ew_CheckInteger($order->orderstatus->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $order->orderstatus->FldErrMsg();
		}
		if (!is_null($order->zemail->FormValue) && $order->zemail->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $order->zemail->FldCaption();
		}

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $sFormCustomError;
		}
		return $ValidateForm;
	}

	// Add record
	function AddRow() {
		global $conn, $Language, $Security, $order;
		$rsnew = array();

		// bookid
		$order->bookid->SetDbValueDef($rsnew, $order->bookid->CurrentValue, 0, FALSE);

		// orderstatus
		$order->orderstatus->SetDbValueDef($rsnew, $order->orderstatus->CurrentValue, 0, FALSE);

		// email
		$order->zemail->SetDbValueDef($rsnew, $order->zemail->CurrentValue, "", FALSE);

		// datatime
		$order->datatime->SetDbValueDef($rsnew, ew_CurrentDateTime(), ew_CurrentDate());
		$rsnew['datatime'] =& $order->datatime->DbValue;

		// Call Row Inserting event
		$bInsertRow = $order->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($order->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($order->CancelMessage <> "") {
				$this->setMessage($order->CancelMessage);
				$order->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$order->orderid->setDbValue($conn->Insert_ID());
			$rsnew['orderid'] = $order->orderid->DbValue;

			// Call Row Inserted event
			$order->Row_Inserted($rsnew);
		}
		return $AddRow;
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
}
?>
