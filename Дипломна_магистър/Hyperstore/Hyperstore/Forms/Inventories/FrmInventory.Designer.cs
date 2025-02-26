namespace HyperStoreApp.Forms.Inventories
{
    partial class FrmInventory
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.components = new System.ComponentModel.Container();
            this.label1 = new System.Windows.Forms.Label();
            this.lblDepartment = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.dgChecked = new System.Windows.Forms.DataGridView();
            this.dgStock = new System.Windows.Forms.DataGridView();
            this.label4 = new System.Windows.Forms.Label();
            this.cbQty = new System.Windows.Forms.ComboBox();
            this.btnCancel = new System.Windows.Forms.Button();
            this.btnAccept = new System.Windows.Forms.Button();
            this.label12 = new System.Windows.Forms.Label();
            this.label11 = new System.Windows.Forms.Label();
            this.tbBarcode = new System.Windows.Forms.TextBox();
            this.label13 = new System.Windows.Forms.Label();
            this.rbAdd = new System.Windows.Forms.RadioButton();
            this.rbRemove = new System.Windows.Forms.RadioButton();
            this.inventoryStockDatasource = new System.Windows.Forms.BindingSource(this.components);
            this.inventoryFoundDatasource = new System.Windows.Forms.BindingSource(this.components);
            this.qtyColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.product2Column = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.barcode2Column = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.qtyActual = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.productColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.barcodeColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            ((System.ComponentModel.ISupportInitialize)(this.dgChecked)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.dgStock)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.inventoryStockDatasource)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.inventoryFoundDatasource)).BeginInit();
            this.SuspendLayout();
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(34, 21);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(79, 13);
            this.label1.TabIndex = 0;
            this.label1.Text = "Департамент:";
            // 
            // lblDepartment
            // 
            this.lblDepartment.AutoSize = true;
            this.lblDepartment.Location = new System.Drawing.Point(119, 21);
            this.lblDepartment.Name = "lblDepartment";
            this.lblDepartment.Size = new System.Drawing.Size(35, 13);
            this.lblDepartment.TabIndex = 1;
            this.lblDepartment.Text = "label2";
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(12, 65);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(99, 13);
            this.label3.TabIndex = 2;
            this.label3.Text = "Налични продукти";
            // 
            // dgChecked
            // 
            this.dgChecked.AllowUserToAddRows = false;
            this.dgChecked.AllowUserToDeleteRows = false;
            this.dgChecked.AutoGenerateColumns = false;
            this.dgChecked.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgChecked.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.qtyActual,
            this.productColumn,
            this.barcodeColumn});
            this.dgChecked.DataSource = this.inventoryFoundDatasource;
            this.dgChecked.Location = new System.Drawing.Point(12, 81);
            this.dgChecked.Name = "dgChecked";
            this.dgChecked.ReadOnly = true;
            this.dgChecked.RowHeadersVisible = false;
            this.dgChecked.Size = new System.Drawing.Size(269, 305);
            this.dgChecked.TabIndex = 4;
            this.dgChecked.CellDoubleClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dgChecked_CellDoubleClick);
            this.dgChecked.DataBindingComplete += new System.Windows.Forms.DataGridViewBindingCompleteEventHandler(this.dgChecked_DataBindingComplete);
            // 
            // dgStock
            // 
            this.dgStock.AllowUserToAddRows = false;
            this.dgStock.AllowUserToDeleteRows = false;
            this.dgStock.AutoGenerateColumns = false;
            this.dgStock.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgStock.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.qtyColumn,
            this.product2Column,
            this.barcode2Column});
            this.dgStock.DataSource = this.inventoryStockDatasource;
            this.dgStock.Location = new System.Drawing.Point(487, 81);
            this.dgStock.Name = "dgStock";
            this.dgStock.ReadOnly = true;
            this.dgStock.RowHeadersVisible = false;
            this.dgStock.Size = new System.Drawing.Size(271, 306);
            this.dgStock.TabIndex = 6;
            this.dgStock.CellDoubleClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dgStock_CellDoubleClick);
            this.dgStock.DataBindingComplete += new System.Windows.Forms.DataGridViewBindingCompleteEventHandler(this.dgStock_DataBindingComplete);
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(484, 65);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(110, 13);
            this.label4.TabIndex = 5;
            this.label4.Text = "Продукти по списък";
            // 
            // cbQty
            // 
            this.cbQty.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList;
            this.cbQty.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.cbQty.FormattingEnabled = true;
            this.cbQty.Items.AddRange(new object[] {
            "1",
            "5",
            "10",
            "20",
            "50",
            "100"});
            this.cbQty.Location = new System.Drawing.Point(303, 228);
            this.cbQty.Name = "cbQty";
            this.cbQty.Size = new System.Drawing.Size(38, 21);
            this.cbQty.TabIndex = 33;
            // 
            // btnCancel
            // 
            this.btnCancel.DialogResult = System.Windows.Forms.DialogResult.Cancel;
            this.btnCancel.Location = new System.Drawing.Point(394, 364);
            this.btnCancel.Name = "btnCancel";
            this.btnCancel.Size = new System.Drawing.Size(75, 23);
            this.btnCancel.TabIndex = 30;
            this.btnCancel.Text = "Откажи";
            this.btnCancel.UseVisualStyleBackColor = true;
            // 
            // btnAccept
            // 
            this.btnAccept.DialogResult = System.Windows.Forms.DialogResult.OK;
            this.btnAccept.Location = new System.Drawing.Point(303, 363);
            this.btnAccept.Name = "btnAccept";
            this.btnAccept.Size = new System.Drawing.Size(75, 23);
            this.btnAccept.TabIndex = 29;
            this.btnAccept.Text = "Завърши";
            this.btnAccept.UseVisualStyleBackColor = true;
            // 
            // label12
            // 
            this.label12.AutoSize = true;
            this.label12.Location = new System.Drawing.Point(357, 213);
            this.label12.Name = "label12";
            this.label12.Size = new System.Drawing.Size(87, 13);
            this.label12.TabIndex = 27;
            this.label12.Text = "Баркод продукт";
            // 
            // label11
            // 
            this.label11.AutoSize = true;
            this.label11.Location = new System.Drawing.Point(300, 213);
            this.label11.Name = "label11";
            this.label11.Size = new System.Drawing.Size(29, 13);
            this.label11.TabIndex = 26;
            this.label11.Text = "Кол.";
            // 
            // tbBarcode
            // 
            this.tbBarcode.Location = new System.Drawing.Point(360, 229);
            this.tbBarcode.Name = "tbBarcode";
            this.tbBarcode.Size = new System.Drawing.Size(109, 20);
            this.tbBarcode.TabIndex = 25;
            this.tbBarcode.KeyDown += new System.Windows.Forms.KeyEventHandler(this.tbBarcode_KeyDown);
            // 
            // label13
            // 
            this.label13.AutoSize = true;
            this.label13.Location = new System.Drawing.Point(343, 233);
            this.label13.Name = "label13";
            this.label13.Size = new System.Drawing.Size(14, 13);
            this.label13.TabIndex = 28;
            this.label13.Text = "Х";
            // 
            // rbAdd
            // 
            this.rbAdd.AutoSize = true;
            this.rbAdd.Checked = true;
            this.rbAdd.Location = new System.Drawing.Point(392, 190);
            this.rbAdd.Name = "rbAdd";
            this.rbAdd.Size = new System.Drawing.Size(64, 17);
            this.rbAdd.TabIndex = 35;
            this.rbAdd.TabStop = true;
            this.rbAdd.Text = "Добави";
            this.rbAdd.UseVisualStyleBackColor = true;
            // 
            // rbRemove
            // 
            this.rbRemove.AutoSize = true;
            this.rbRemove.Location = new System.Drawing.Point(309, 190);
            this.rbRemove.Name = "rbRemove";
            this.rbRemove.Size = new System.Drawing.Size(76, 17);
            this.rbRemove.TabIndex = 34;
            this.rbRemove.Text = "Премахни";
            this.rbRemove.UseVisualStyleBackColor = true;
            // 
            // inventoryStockDatasource
            // 
            this.inventoryStockDatasource.DataSource = typeof(HyperStoreApp.InventoryDetail);
            // 
            // inventoryFoundDatasource
            // 
            this.inventoryFoundDatasource.DataSource = typeof(HyperStoreApp.InventoryDetail);
            // 
            // qtyColumn
            // 
            this.qtyColumn.HeaderText = "Кол";
            this.qtyColumn.Name = "qtyColumn";
            this.qtyColumn.ReadOnly = true;
            this.qtyColumn.Width = 30;
            // 
            // product2Column
            // 
            this.product2Column.HeaderText = "Продукт";
            this.product2Column.Name = "product2Column";
            this.product2Column.ReadOnly = true;
            this.product2Column.Width = 120;
            // 
            // barcode2Column
            // 
            this.barcode2Column.HeaderText = "Баркод";
            this.barcode2Column.Name = "barcode2Column";
            this.barcode2Column.ReadOnly = true;
            // 
            // qtyActual
            // 
            this.qtyActual.DataPropertyName = "qtyActual";
            this.qtyActual.HeaderText = "Кол";
            this.qtyActual.Name = "qtyActual";
            this.qtyActual.ReadOnly = true;
            this.qtyActual.Width = 30;
            // 
            // productColumn
            // 
            this.productColumn.HeaderText = "Продукт";
            this.productColumn.Name = "productColumn";
            this.productColumn.ReadOnly = true;
            this.productColumn.Width = 120;
            // 
            // barcodeColumn
            // 
            this.barcodeColumn.HeaderText = "Баркод";
            this.barcodeColumn.Name = "barcodeColumn";
            this.barcodeColumn.ReadOnly = true;
            // 
            // FrmInventory
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.CancelButton = this.btnCancel;
            this.ClientSize = new System.Drawing.Size(764, 397);
            this.Controls.Add(this.rbAdd);
            this.Controls.Add(this.rbRemove);
            this.Controls.Add(this.cbQty);
            this.Controls.Add(this.btnCancel);
            this.Controls.Add(this.btnAccept);
            this.Controls.Add(this.label12);
            this.Controls.Add(this.label11);
            this.Controls.Add(this.tbBarcode);
            this.Controls.Add(this.label13);
            this.Controls.Add(this.dgStock);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.dgChecked);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.lblDepartment);
            this.Controls.Add(this.label1);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedDialog;
            this.MaximizeBox = false;
            this.MinimizeBox = false;
            this.Name = "FrmInventory";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Инвентаризация";
            this.FormClosing += new System.Windows.Forms.FormClosingEventHandler(this.FrmInventory_FormClosing);
            ((System.ComponentModel.ISupportInitialize)(this.dgChecked)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.dgStock)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.inventoryStockDatasource)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.inventoryFoundDatasource)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label lblDepartment;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.DataGridView dgChecked;
        private System.Windows.Forms.DataGridView dgStock;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.ComboBox cbQty;
        private System.Windows.Forms.Button btnCancel;
        private System.Windows.Forms.Button btnAccept;
        private System.Windows.Forms.Label label12;
        private System.Windows.Forms.Label label11;
        private System.Windows.Forms.TextBox tbBarcode;
        private System.Windows.Forms.Label label13;
        private System.Windows.Forms.BindingSource inventoryFoundDatasource;
        private System.Windows.Forms.BindingSource inventoryStockDatasource;
        private System.Windows.Forms.RadioButton rbAdd;
        private System.Windows.Forms.RadioButton rbRemove;
        private System.Windows.Forms.DataGridViewTextBoxColumn qtyActual;
        private System.Windows.Forms.DataGridViewTextBoxColumn productColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn barcodeColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn qtyColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn product2Column;
        private System.Windows.Forms.DataGridViewTextBoxColumn barcode2Column;
    }
}