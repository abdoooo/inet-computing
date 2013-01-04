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
$bookpost_add = new cbookpost_add();
$Page =& $bookpost_add;

// Page init
$bookpost_add->Page_Init();

// Page main
$bookpost_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var bookpost_add = new ew_Page("bookpost_add");

// page properties
bookpost_add.PageID = "add"; // page ID
bookpost_add.FormID = "fbookpostadd"; // form ID
var EW_PAGE_ID = bookpost_add.PageID; // for backward compatibility

// extend page with ValidateForm function
bookpost_add.ValidateForm = function(fobj) {
	ew_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_name"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($bookpost->name->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_cata"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($bookpost->cata->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_info"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($bookpost->info->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_useremail"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($bookpost->useremail->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_price"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($bookpost->price->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_price"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "<?php echo ew_JsEncode2($bookpost->price->FldErrMsg()) ?>");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
bookpost_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
bookpost_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
bookpost_add.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker"><?php echo $Language->Phrase("Add") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $bookpost->TableCaption() ?><br><br>
<a href="<?php echo $bookpost->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></span></p>
<?php
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
$bookpost_add->ShowMessage();
?>
<form name="fbookpostadd" id="fbookpostadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return bookpost_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="bookpost">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($bookpost->name->Visible) { // name ?>
	<tr<?php echo $bookpost->name->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->name->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $bookpost->name->CellAttributes() ?>><span id="el_name">
<input type="text" name="x_name" id="x_name" title="<?php echo $bookpost->name->FldTitle() ?>" size="30" maxlength="100" value="<?php echo $bookpost->name->EditValue ?>"<?php echo $bookpost->name->EditAttributes() ?>>
</span><?php echo $bookpost->name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($bookpost->cata->Visible) { // cata ?>
	<tr<?php echo $bookpost->cata->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->cata->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $bookpost->cata->CellAttributes() ?>><span id="el_cata">
<select id="x_cata" name="x_cata" title="<?php echo $bookpost->cata->FldTitle() ?>"<?php echo $bookpost->cata->EditAttributes() ?>>
<?php
if (is_array($bookpost->cata->EditValue)) {
	$arwrk = $bookpost->cata->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($bookpost->cata->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $bookpost->cata->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($bookpost->author->Visible) { // author ?>
	<tr<?php echo $bookpost->author->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->author->FldCaption() ?></td>
		<td<?php echo $bookpost->author->CellAttributes() ?>><span id="el_author">
<input type="text" name="x_author" id="x_author" title="<?php echo $bookpost->author->FldTitle() ?>" size="30" maxlength="100" value="<?php echo $bookpost->author->EditValue ?>"<?php echo $bookpost->author->EditAttributes() ?>>
</span><?php echo $bookpost->author->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($bookpost->publisher->Visible) { // publisher ?>
	<tr<?php echo $bookpost->publisher->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->publisher->FldCaption() ?></td>
		<td<?php echo $bookpost->publisher->CellAttributes() ?>><span id="el_publisher">
<input type="text" name="x_publisher" id="x_publisher" title="<?php echo $bookpost->publisher->FldTitle() ?>" size="30" maxlength="100" value="<?php echo $bookpost->publisher->EditValue ?>"<?php echo $bookpost->publisher->EditAttributes() ?>>
</span><?php echo $bookpost->publisher->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($bookpost->info->Visible) { // info ?>
	<tr<?php echo $bookpost->info->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->info->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $bookpost->info->CellAttributes() ?>><span id="el_info">
<textarea name="x_info" id="x_info" title="<?php echo $bookpost->info->FldTitle() ?>" cols="35" rows="4"<?php echo $bookpost->info->EditAttributes() ?>><?php echo $bookpost->info->EditValue ?></textarea>
</span><?php echo $bookpost->info->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($bookpost->code->Visible) { // code ?>
	<tr<?php echo $bookpost->code->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->code->FldCaption() ?></td>
		<td<?php echo $bookpost->code->CellAttributes() ?>><span id="el_code">
<input type="text" name="x_code" id="x_code" title="<?php echo $bookpost->code->FldTitle() ?>" size="30" maxlength="50" value="<?php echo $bookpost->code->EditValue ?>"<?php echo $bookpost->code->EditAttributes() ?>>
</span><?php echo $bookpost->code->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($bookpost->pic->Visible) { // pic ?>
	<tr<?php echo $bookpost->pic->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->pic->FldCaption() ?></td>
		<td<?php echo $bookpost->pic->CellAttributes() ?>><span id="el_pic">
<input type="text" name="x_pic" id="x_pic" title="<?php echo $bookpost->pic->FldTitle() ?>" size="30" maxlength="150" value="<?php echo $bookpost->pic->EditValue ?>"<?php echo $bookpost->pic->EditAttributes() ?>>
</span><?php echo $bookpost->pic->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($bookpost->useremail->Visible) { // useremail ?>
	<tr<?php echo $bookpost->useremail->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->useremail->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $bookpost->useremail->CellAttributes() ?>><span id="el_useremail">
<input type="text" name="x_useremail" id="x_useremail" title="<?php echo $bookpost->useremail->FldTitle() ?>" size="30" maxlength="50" value="<?php echo $bookpost->useremail->EditValue ?>"<?php echo $bookpost->useremail->EditAttributes() ?>>
</span><?php echo $bookpost->useremail->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($bookpost->price->Visible) { // price ?>
	<tr<?php echo $bookpost->price->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->price->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $bookpost->price->CellAttributes() ?>><span id="el_price">
<input type="text" name="x_price" id="x_price" title="<?php echo $bookpost->price->FldTitle() ?>" size="30" value="<?php echo $bookpost->price->EditValue ?>"<?php echo $bookpost->price->EditAttributes() ?>>
</span><?php echo $bookpost->price->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($bookpost->hidden->Visible) { // hidden ?>
	<tr<?php echo $bookpost->hidden->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo $bookpost->hidden->FldCaption() ?></td>
		<td<?php echo $bookpost->hidden->CellAttributes() ?>><span id="el_hidden">
<select id="x_hidden" name="x_hidden" title="<?php echo $bookpost->hidden->FldTitle() ?>"<?php echo $bookpost->hidden->EditAttributes() ?>>
<?php
if (is_array($bookpost->hidden->EditValue)) {
	$arwrk = $bookpost->hidden->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($bookpost->hidden->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $bookpost->hidden->CustomMsg ?></td>
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
$bookpost_add->Page_Terminate();
?>
<?php

//
// Page class
//
class cbookpost_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'bookpost';

	// Page object name
	var $PageObjName = 'bookpost_add';

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
	function cbookpost_add() {
		global $conn, $Language;

		// Language object
		$Language = new cLanguage();

		// Table object (bookpost)
		$GLOBALS["bookpost"] = new cbookpost();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

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
		global $objForm, $Language, $gsFormError, $bookpost;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["bookid"] != "") {
		  $bookpost->bookid->setQueryStringValue($_GET["bookid"]);
		} else {
		  $bCopy = FALSE;
		}

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $bookpost->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$bookpost->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $bookpost->CurrentAction = "C"; // Copy record
		  } else {
		    $bookpost->CurrentAction = "I"; // Display blank record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($bookpost->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage($Language->Phrase("NoRecord")); // No record found
		      $this->Page_Terminate("bookpostlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$bookpost->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $bookpost->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$bookpost->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $bookpost;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $bookpost;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $bookpost;
		$bookpost->name->setFormValue($objForm->GetValue("x_name"));
		$bookpost->cata->setFormValue($objForm->GetValue("x_cata"));
		$bookpost->author->setFormValue($objForm->GetValue("x_author"));
		$bookpost->publisher->setFormValue($objForm->GetValue("x_publisher"));
		$bookpost->info->setFormValue($objForm->GetValue("x_info"));
		$bookpost->code->setFormValue($objForm->GetValue("x_code"));
		$bookpost->pic->setFormValue($objForm->GetValue("x_pic"));
		$bookpost->useremail->setFormValue($objForm->GetValue("x_useremail"));
		$bookpost->price->setFormValue($objForm->GetValue("x_price"));
		$bookpost->datatime->setFormValue($objForm->GetValue("x_datatime"));
		$bookpost->datatime->CurrentValue = ew_UnFormatDateTime($bookpost->datatime->CurrentValue, 5);
		$bookpost->hidden->setFormValue($objForm->GetValue("x_hidden"));
		$bookpost->bookid->setFormValue($objForm->GetValue("x_bookid"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $bookpost;
		$bookpost->bookid->CurrentValue = $bookpost->bookid->FormValue;
		$bookpost->name->CurrentValue = $bookpost->name->FormValue;
		$bookpost->cata->CurrentValue = $bookpost->cata->FormValue;
		$bookpost->author->CurrentValue = $bookpost->author->FormValue;
		$bookpost->publisher->CurrentValue = $bookpost->publisher->FormValue;
		$bookpost->info->CurrentValue = $bookpost->info->FormValue;
		$bookpost->code->CurrentValue = $bookpost->code->FormValue;
		$bookpost->pic->CurrentValue = $bookpost->pic->FormValue;
		$bookpost->useremail->CurrentValue = $bookpost->useremail->FormValue;
		$bookpost->price->CurrentValue = $bookpost->price->FormValue;
		$bookpost->datatime->CurrentValue = $bookpost->datatime->FormValue;
		$bookpost->datatime->CurrentValue = ew_UnFormatDateTime($bookpost->datatime->CurrentValue, 5);
		$bookpost->hidden->CurrentValue = $bookpost->hidden->FormValue;
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
		} elseif ($bookpost->RowType == EW_ROWTYPE_ADD) { // Add row

			// name
			$bookpost->name->EditCustomAttributes = "";
			$bookpost->name->EditValue = ew_HtmlEncode($bookpost->name->CurrentValue);

			// cata
			$bookpost->cata->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("eng", "English");
			$arwrk[] = array("lan", "Languages");
			$arwrk[] = array("his", "History");
			$arwrk[] = array("acc", "Accounting");
			$arwrk[] = array("sci", "Science");
			$arwrk[] = array("com", "Computer");
			$arwrk[] = array("engi", "Engineering");
			$arwrk[] = array("mus", "Music");
			$arwrk[] = array("art", "Art");
			$arwrk[] = array("oth", "Other");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$bookpost->cata->EditValue = $arwrk;

			// author
			$bookpost->author->EditCustomAttributes = "";
			$bookpost->author->EditValue = ew_HtmlEncode($bookpost->author->CurrentValue);

			// publisher
			$bookpost->publisher->EditCustomAttributes = "";
			$bookpost->publisher->EditValue = ew_HtmlEncode($bookpost->publisher->CurrentValue);

			// info
			$bookpost->info->EditCustomAttributes = "";
			$bookpost->info->EditValue = ew_HtmlEncode($bookpost->info->CurrentValue);

			// code
			$bookpost->code->EditCustomAttributes = "";
			$bookpost->code->EditValue = ew_HtmlEncode($bookpost->code->CurrentValue);

			// pic
			$bookpost->pic->EditCustomAttributes = "";
			$bookpost->pic->EditValue = ew_HtmlEncode($bookpost->pic->CurrentValue);

			// useremail
			$bookpost->useremail->EditCustomAttributes = "";
			$bookpost->useremail->EditValue = ew_HtmlEncode($bookpost->useremail->CurrentValue);

			// price
			$bookpost->price->EditCustomAttributes = "";
			$bookpost->price->EditValue = ew_HtmlEncode($bookpost->price->CurrentValue);

			// datatime
			// hidden

			$bookpost->hidden->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Yes");
			$arwrk[] = array("0", "No");
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$bookpost->hidden->EditValue = $arwrk;
		}

		// Call Row Rendered event
		if ($bookpost->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$bookpost->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $bookpost;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!is_null($bookpost->name->FormValue) && $bookpost->name->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $bookpost->name->FldCaption();
		}
		if (!is_null($bookpost->cata->FormValue) && $bookpost->cata->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $bookpost->cata->FldCaption();
		}
		if (!is_null($bookpost->info->FormValue) && $bookpost->info->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $bookpost->info->FldCaption();
		}
		if (!is_null($bookpost->useremail->FormValue) && $bookpost->useremail->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $bookpost->useremail->FldCaption();
		}
		if (!is_null($bookpost->price->FormValue) && $bookpost->price->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $Language->Phrase("EnterRequiredField") . " - " . $bookpost->price->FldCaption();
		}
		if (!ew_CheckInteger($bookpost->price->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= $bookpost->price->FldErrMsg();
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
		global $conn, $Language, $Security, $bookpost;
		$rsnew = array();

		// name
		$bookpost->name->SetDbValueDef($rsnew, $bookpost->name->CurrentValue, "", FALSE);

		// cata
		$bookpost->cata->SetDbValueDef($rsnew, $bookpost->cata->CurrentValue, "", FALSE);

		// author
		$bookpost->author->SetDbValueDef($rsnew, $bookpost->author->CurrentValue, NULL, FALSE);

		// publisher
		$bookpost->publisher->SetDbValueDef($rsnew, $bookpost->publisher->CurrentValue, NULL, FALSE);

		// info
		$bookpost->info->SetDbValueDef($rsnew, $bookpost->info->CurrentValue, "", FALSE);

		// code
		$bookpost->code->SetDbValueDef($rsnew, $bookpost->code->CurrentValue, NULL, FALSE);

		// pic
		$bookpost->pic->SetDbValueDef($rsnew, $bookpost->pic->CurrentValue, NULL, FALSE);

		// useremail
		$bookpost->useremail->SetDbValueDef($rsnew, $bookpost->useremail->CurrentValue, "", FALSE);

		// price
		$bookpost->price->SetDbValueDef($rsnew, $bookpost->price->CurrentValue, 0, FALSE);

		// datatime
		$bookpost->datatime->SetDbValueDef($rsnew, ew_CurrentDateTime(), ew_CurrentDate());
		$rsnew['datatime'] =& $bookpost->datatime->DbValue;

		// hidden
		$bookpost->hidden->SetDbValueDef($rsnew, $bookpost->hidden->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$bInsertRow = $bookpost->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($bookpost->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($bookpost->CancelMessage <> "") {
				$this->setMessage($bookpost->CancelMessage);
				$bookpost->CancelMessage = "";
			} else {
				$this->setMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$bookpost->bookid->setDbValue($conn->Insert_ID());
			$rsnew['bookid'] = $bookpost->bookid->DbValue;

			// Call Row Inserted event
			$bookpost->Row_Inserted($rsnew);
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
