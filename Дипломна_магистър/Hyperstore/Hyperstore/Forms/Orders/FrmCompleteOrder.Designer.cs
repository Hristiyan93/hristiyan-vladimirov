namespace HyperStoreApp.Forms.Orders
{
    partial class FrmCompleteOrder
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
            this.cbQty = new System.Windows.Forms.ComboBox();
            this.rbAdd = new System.Windows.Forms.RadioButton();
            this.rbRemove = new System.Windows.Forms.RadioButton();
            this.btnCancel = new System.Windows.Forms.Button();
            this.btnAccept = new System.Windows.Forms.Button();
            this.label12 = new System.Windows.Forms.Label();
            this.label11 = new System.Windows.Forms.Label();
            this.label10 = new System.Windows.Forms.Label();
            this.label9 = new System.Windows.Forms.Label();
            this.label13 = new System.Windows.Forms.Label();
            this.dataGridViewTextBoxColumn1 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.tbBarcode = new System.Windows.Forms.TextBox();
            this.dataGridViewTextBoxColumn2 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.lblUser = new System.Windows.Forms.Label();
            this.lblDate = new System.Windows.Forms.Label();
            this.label6 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.label1 = new System.Windows.Forms.Label();
            this.dgOrderedProducts = new System.Windows.Forms.DataGridView();
            this.panel1 = new System.Windows.Forms.Panel();
            this.dgReceivedProducts = new System.Windows.Forms.DataGridView();
            this.ProductColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.barcodeColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.panel2 = new System.Windows.Forms.Panel();
            this.lblPrice = new System.Windows.Forms.Label();
            this.lblDepartment = new System.Windows.Forms.Label();
            this.orderQty = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.prodColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.bcodeColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.qtyOrderedDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.receievedSource = new System.Windows.Forms.BindingSource(this.components);
            this.idDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.orderIdDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.productIdDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.priceDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.qtyOrderedDataGridViewTextBoxColumn1 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.qtyReceivedDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.productDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.orderDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.orderedSource = new System.Windows.Forms.BindingSource(this.components);
            this.orderBindingSource = new System.Windows.Forms.BindingSource(this.components);
            ((System.ComponentModel.ISupportInitialize)(this.dgOrderedProducts)).BeginInit();
            this.panel1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgReceivedProducts)).BeginInit();
            this.panel2.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.receievedSource)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.orderedSource)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.orderBindingSource)).BeginInit();
            this.SuspendLayout();
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
            this.cbQty.Location = new System.Drawing.Point(284, 244);
            this.cbQty.Name = "cbQty";
            this.cbQty.Size = new System.Drawing.Size(38, 21);
            this.cbQty.TabIndex = 45;
            // 
            // rbAdd
            // 
            this.rbAdd.AutoSize = true;
            this.rbAdd.Checked = true;
            this.rbAdd.Location = new System.Drawing.Point(367, 201);
            this.rbAdd.Name = "rbAdd";
            this.rbAdd.Size = new System.Drawing.Size(64, 17);
            this.rbAdd.TabIndex = 44;
            this.rbAdd.TabStop = true;
            this.rbAdd.Text = "Добави";
            this.rbAdd.UseVisualStyleBackColor = true;
            // 
            // rbRemove
            // 
            this.rbRemove.AutoSize = true;
            this.rbRemove.Location = new System.Drawing.Point(284, 201);
            this.rbRemove.Name = "rbRemove";
            this.rbRemove.Size = new System.Drawing.Size(76, 17);
            this.rbRemove.TabIndex = 43;
            this.rbRemove.Text = "Премахни";
            this.rbRemove.UseVisualStyleBackColor = true;
            // 
            // btnCancel
            // 
            this.btnCancel.DialogResult = System.Windows.Forms.DialogResult.Cancel;
            this.btnCancel.Location = new System.Drawing.Point(375, 380);
            this.btnCancel.Name = "btnCancel";
            this.btnCancel.Size = new System.Drawing.Size(75, 23);
            this.btnCancel.TabIndex = 42;
            this.btnCancel.Text = "Откажи";
            this.btnCancel.UseVisualStyleBackColor = true;
            // 
            // btnAccept
            // 
            this.btnAccept.DialogResult = System.Windows.Forms.DialogResult.OK;
            this.btnAccept.Location = new System.Drawing.Point(284, 379);
            this.btnAccept.Name = "btnAccept";
            this.btnAccept.Size = new System.Drawing.Size(75, 23);
            this.btnAccept.TabIndex = 41;
            this.btnAccept.Text = "Приеми";
            this.btnAccept.UseVisualStyleBackColor = true;
            // 
            // label12
            // 
            this.label12.AutoSize = true;
            this.label12.Location = new System.Drawing.Point(338, 229);
            this.label12.Name = "label12";
            this.label12.Size = new System.Drawing.Size(87, 13);
            this.label12.TabIndex = 39;
            this.label12.Text = "Баркод продукт";
            // 
            // label11
            // 
            this.label11.AutoSize = true;
            this.label11.Location = new System.Drawing.Point(281, 229);
            this.label11.Name = "label11";
            this.label11.Size = new System.Drawing.Size(29, 13);
            this.label11.TabIndex = 38;
            this.label11.Text = "Кол.";
            // 
            // label10
            // 
            this.label10.AutoSize = true;
            this.label10.Location = new System.Drawing.Point(471, 112);
            this.label10.Name = "label10";
            this.label10.Size = new System.Drawing.Size(106, 13);
            this.label10.TabIndex = 36;
            this.label10.Text = "Поръчани продукти";
            // 
            // label9
            // 
            this.label9.AutoSize = true;
            this.label9.Location = new System.Drawing.Point(11, 112);
            this.label9.Name = "label9";
            this.label9.Size = new System.Drawing.Size(104, 13);
            this.label9.TabIndex = 35;
            this.label9.Text = "Получени продукти";
            // 
            // label13
            // 
            this.label13.AutoSize = true;
            this.label13.Location = new System.Drawing.Point(324, 249);
            this.label13.Name = "label13";
            this.label13.Size = new System.Drawing.Size(14, 13);
            this.label13.TabIndex = 40;
            this.label13.Text = "Х";
            // 
            // dataGridViewTextBoxColumn1
            // 
            this.dataGridViewTextBoxColumn1.DataPropertyName = "Product";
            this.dataGridViewTextBoxColumn1.HeaderText = "Продукт";
            this.dataGridViewTextBoxColumn1.Name = "dataGridViewTextBoxColumn1";
            // 
            // tbBarcode
            // 
            this.tbBarcode.Location = new System.Drawing.Point(341, 245);
            this.tbBarcode.Name = "tbBarcode";
            this.tbBarcode.Size = new System.Drawing.Size(109, 20);
            this.tbBarcode.TabIndex = 37;
            this.tbBarcode.KeyDown += new System.Windows.Forms.KeyEventHandler(this.tbBarcode_KeyDown);
            // 
            // dataGridViewTextBoxColumn2
            // 
            this.dataGridViewTextBoxColumn2.DataPropertyName = "Product";
            this.dataGridViewTextBoxColumn2.HeaderText = "Продукт";
            this.dataGridViewTextBoxColumn2.Name = "dataGridViewTextBoxColumn2";
            this.dataGridViewTextBoxColumn2.ReadOnly = true;
            this.dataGridViewTextBoxColumn2.Width = 120;
            // 
            // lblUser
            // 
            this.lblUser.AutoSize = true;
            this.lblUser.Location = new System.Drawing.Point(110, 33);
            this.lblUser.Name = "lblUser";
            this.lblUser.Size = new System.Drawing.Size(19, 13);
            this.lblUser.TabIndex = 30;
            this.lblUser.Text = "??";
            // 
            // lblDate
            // 
            this.lblDate.AutoSize = true;
            this.lblDate.Location = new System.Drawing.Point(110, 8);
            this.lblDate.Name = "lblDate";
            this.lblDate.Size = new System.Drawing.Size(19, 13);
            this.lblDate.TabIndex = 29;
            this.lblDate.Text = "??";
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Location = new System.Drawing.Point(11, 84);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(70, 13);
            this.label6.TabIndex = 28;
            this.label6.Text = "Всичко цена";
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(11, 58);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(76, 13);
            this.label4.TabIndex = 27;
            this.label4.Text = "Департамент";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(11, 33);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(67, 13);
            this.label2.TabIndex = 26;
            this.label2.Text = "Потребител";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(11, 8);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(33, 13);
            this.label1.TabIndex = 25;
            this.label1.Text = "Дата";
            // 
            // dgOrderedProducts
            // 
            this.dgOrderedProducts.AllowUserToAddRows = false;
            this.dgOrderedProducts.AllowUserToDeleteRows = false;
            this.dgOrderedProducts.AutoGenerateColumns = false;
            this.dgOrderedProducts.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgOrderedProducts.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.orderQty,
            this.prodColumn,
            this.bcodeColumn,
            this.idDataGridViewTextBoxColumn,
            this.orderIdDataGridViewTextBoxColumn,
            this.productIdDataGridViewTextBoxColumn,
            this.priceDataGridViewTextBoxColumn,
            this.qtyOrderedDataGridViewTextBoxColumn1,
            this.qtyReceivedDataGridViewTextBoxColumn,
            this.productDataGridViewTextBoxColumn,
            this.orderDataGridViewTextBoxColumn});
            this.dgOrderedProducts.DataSource = this.orderedSource;
            this.dgOrderedProducts.Location = new System.Drawing.Point(3, 0);
            this.dgOrderedProducts.Name = "dgOrderedProducts";
            this.dgOrderedProducts.ReadOnly = true;
            this.dgOrderedProducts.RowHeadersVisible = false;
            this.dgOrderedProducts.Size = new System.Drawing.Size(238, 272);
            this.dgOrderedProducts.TabIndex = 0;
            this.dgOrderedProducts.CellDoubleClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dgOrderedProducts_CellDoubleClick);
            this.dgOrderedProducts.DataBindingComplete += new System.Windows.Forms.DataGridViewBindingCompleteEventHandler(this.dgOrderedProducts_DataBindingComplete);
            // 
            // panel1
            // 
            this.panel1.Controls.Add(this.dgReceivedProducts);
            this.panel1.Location = new System.Drawing.Point(14, 128);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(244, 275);
            this.panel1.TabIndex = 33;
            // 
            // dgReceivedProducts
            // 
            this.dgReceivedProducts.AllowUserToAddRows = false;
            this.dgReceivedProducts.AllowUserToDeleteRows = false;
            this.dgReceivedProducts.AutoGenerateColumns = false;
            this.dgReceivedProducts.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgReceivedProducts.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.qtyOrderedDataGridViewTextBoxColumn,
            this.ProductColumn,
            this.barcodeColumn});
            this.dgReceivedProducts.DataSource = this.receievedSource;
            this.dgReceivedProducts.Location = new System.Drawing.Point(0, 0);
            this.dgReceivedProducts.Name = "dgReceivedProducts";
            this.dgReceivedProducts.ReadOnly = true;
            this.dgReceivedProducts.RowHeadersVisible = false;
            this.dgReceivedProducts.Size = new System.Drawing.Size(241, 272);
            this.dgReceivedProducts.TabIndex = 22;
            this.dgReceivedProducts.CellDoubleClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dgReceivedProducts_CellDoubleClick);
            this.dgReceivedProducts.DataBindingComplete += new System.Windows.Forms.DataGridViewBindingCompleteEventHandler(this.dgReceivedProducts_DataBindingComplete);
            // 
            // ProductColumn
            // 
            this.ProductColumn.HeaderText = "Продукт";
            this.ProductColumn.Name = "ProductColumn";
            this.ProductColumn.ReadOnly = true;
            // 
            // barcodeColumn
            // 
            this.barcodeColumn.HeaderText = "Баркод";
            this.barcodeColumn.Name = "barcodeColumn";
            this.barcodeColumn.ReadOnly = true;
            // 
            // panel2
            // 
            this.panel2.Controls.Add(this.dgOrderedProducts);
            this.panel2.Location = new System.Drawing.Point(474, 125);
            this.panel2.Name = "panel2";
            this.panel2.Size = new System.Drawing.Size(244, 275);
            this.panel2.TabIndex = 34;
            // 
            // lblPrice
            // 
            this.lblPrice.AutoSize = true;
            this.lblPrice.DataBindings.Add(new System.Windows.Forms.Binding("Text", this.orderBindingSource, "totalCost", true));
            this.lblPrice.Location = new System.Drawing.Point(110, 84);
            this.lblPrice.Name = "lblPrice";
            this.lblPrice.Size = new System.Drawing.Size(19, 13);
            this.lblPrice.TabIndex = 32;
            this.lblPrice.Text = "??";
            // 
            // lblDepartment
            // 
            this.lblDepartment.AutoSize = true;
            this.lblDepartment.Location = new System.Drawing.Point(110, 58);
            this.lblDepartment.Name = "lblDepartment";
            this.lblDepartment.Size = new System.Drawing.Size(19, 13);
            this.lblDepartment.TabIndex = 46;
            this.lblDepartment.Text = "??";
            // 
            // orderQty
            // 
            this.orderQty.HeaderText = "Кол";
            this.orderQty.Name = "orderQty";
            this.orderQty.ReadOnly = true;
            this.orderQty.Width = 30;
            // 
            // prodColumn
            // 
            this.prodColumn.HeaderText = "Продукт";
            this.prodColumn.Name = "prodColumn";
            this.prodColumn.ReadOnly = true;
            // 
            // bcodeColumn
            // 
            this.bcodeColumn.HeaderText = "Баркод";
            this.bcodeColumn.Name = "bcodeColumn";
            this.bcodeColumn.ReadOnly = true;
            // 
            // qtyOrderedDataGridViewTextBoxColumn
            // 
            this.qtyOrderedDataGridViewTextBoxColumn.DataPropertyName = "qtyReceived";
            this.qtyOrderedDataGridViewTextBoxColumn.HeaderText = "Кол";
            this.qtyOrderedDataGridViewTextBoxColumn.Name = "qtyOrderedDataGridViewTextBoxColumn";
            this.qtyOrderedDataGridViewTextBoxColumn.ReadOnly = true;
            this.qtyOrderedDataGridViewTextBoxColumn.Width = 30;
            // 
            // receievedSource
            // 
            this.receievedSource.DataSource = typeof(HyperStoreApp.OrderDetail);
            // 
            // idDataGridViewTextBoxColumn
            // 
            this.idDataGridViewTextBoxColumn.DataPropertyName = "Id";
            this.idDataGridViewTextBoxColumn.HeaderText = "Id";
            this.idDataGridViewTextBoxColumn.Name = "idDataGridViewTextBoxColumn";
            this.idDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // orderIdDataGridViewTextBoxColumn
            // 
            this.orderIdDataGridViewTextBoxColumn.DataPropertyName = "orderId";
            this.orderIdDataGridViewTextBoxColumn.HeaderText = "orderId";
            this.orderIdDataGridViewTextBoxColumn.Name = "orderIdDataGridViewTextBoxColumn";
            this.orderIdDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // productIdDataGridViewTextBoxColumn
            // 
            this.productIdDataGridViewTextBoxColumn.DataPropertyName = "productId";
            this.productIdDataGridViewTextBoxColumn.HeaderText = "productId";
            this.productIdDataGridViewTextBoxColumn.Name = "productIdDataGridViewTextBoxColumn";
            this.productIdDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // priceDataGridViewTextBoxColumn
            // 
            this.priceDataGridViewTextBoxColumn.DataPropertyName = "price";
            this.priceDataGridViewTextBoxColumn.HeaderText = "price";
            this.priceDataGridViewTextBoxColumn.Name = "priceDataGridViewTextBoxColumn";
            this.priceDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // qtyOrderedDataGridViewTextBoxColumn1
            // 
            this.qtyOrderedDataGridViewTextBoxColumn1.DataPropertyName = "qtyOrdered";
            this.qtyOrderedDataGridViewTextBoxColumn1.HeaderText = "qtyOrdered";
            this.qtyOrderedDataGridViewTextBoxColumn1.Name = "qtyOrderedDataGridViewTextBoxColumn1";
            this.qtyOrderedDataGridViewTextBoxColumn1.ReadOnly = true;
            // 
            // qtyReceivedDataGridViewTextBoxColumn
            // 
            this.qtyReceivedDataGridViewTextBoxColumn.DataPropertyName = "qtyReceived";
            this.qtyReceivedDataGridViewTextBoxColumn.HeaderText = "qtyReceived";
            this.qtyReceivedDataGridViewTextBoxColumn.Name = "qtyReceivedDataGridViewTextBoxColumn";
            this.qtyReceivedDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // productDataGridViewTextBoxColumn
            // 
            this.productDataGridViewTextBoxColumn.DataPropertyName = "Product";
            this.productDataGridViewTextBoxColumn.HeaderText = "Product";
            this.productDataGridViewTextBoxColumn.Name = "productDataGridViewTextBoxColumn";
            this.productDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // orderDataGridViewTextBoxColumn
            // 
            this.orderDataGridViewTextBoxColumn.DataPropertyName = "Order";
            this.orderDataGridViewTextBoxColumn.HeaderText = "Order";
            this.orderDataGridViewTextBoxColumn.Name = "orderDataGridViewTextBoxColumn";
            this.orderDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // orderedSource
            // 
            this.orderedSource.DataSource = typeof(HyperStoreApp.OrderDetail);
            // 
            // orderBindingSource
            // 
            this.orderBindingSource.DataSource = typeof(HyperStoreApp.Order);
            // 
            // FrmCompleteOrder
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(728, 413);
            this.Controls.Add(this.lblDepartment);
            this.Controls.Add(this.cbQty);
            this.Controls.Add(this.rbAdd);
            this.Controls.Add(this.rbRemove);
            this.Controls.Add(this.btnCancel);
            this.Controls.Add(this.btnAccept);
            this.Controls.Add(this.label12);
            this.Controls.Add(this.label11);
            this.Controls.Add(this.label10);
            this.Controls.Add(this.label9);
            this.Controls.Add(this.label13);
            this.Controls.Add(this.tbBarcode);
            this.Controls.Add(this.lblUser);
            this.Controls.Add(this.lblDate);
            this.Controls.Add(this.label6);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.panel1);
            this.Controls.Add(this.panel2);
            this.Controls.Add(this.lblPrice);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedDialog;
            this.MaximizeBox = false;
            this.MinimizeBox = false;
            this.Name = "FrmCompleteOrder";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Приемане поръчка";
            this.FormClosing += new System.Windows.Forms.FormClosingEventHandler(this.FrmCompleteOrder_FormClosing);
            ((System.ComponentModel.ISupportInitialize)(this.dgOrderedProducts)).EndInit();
            this.panel1.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.dgReceivedProducts)).EndInit();
            this.panel2.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.receievedSource)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.orderedSource)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.orderBindingSource)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.ComboBox cbQty;
        private System.Windows.Forms.RadioButton rbAdd;
        private System.Windows.Forms.RadioButton rbRemove;
        private System.Windows.Forms.Button btnCancel;
        private System.Windows.Forms.Button btnAccept;
        private System.Windows.Forms.Label label12;
        private System.Windows.Forms.Label label11;
        private System.Windows.Forms.Label label10;
        private System.Windows.Forms.Label label9;
        private System.Windows.Forms.Label label13;
        private System.Windows.Forms.DataGridViewTextBoxColumn dataGridViewTextBoxColumn1;
        private System.Windows.Forms.TextBox tbBarcode;
        private System.Windows.Forms.DataGridViewTextBoxColumn dataGridViewTextBoxColumn2;
        private System.Windows.Forms.BindingSource orderBindingSource;
        private System.Windows.Forms.Label lblUser;
        private System.Windows.Forms.Label lblDate;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.DataGridView dgOrderedProducts;
        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.DataGridView dgReceivedProducts;
        private System.Windows.Forms.BindingSource receievedSource;
        private System.Windows.Forms.Panel panel2;
        private System.Windows.Forms.Label lblPrice;
        private System.Windows.Forms.Label lblDepartment;
        private System.Windows.Forms.DataGridViewTextBoxColumn qtyOrderedDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn ProductColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn barcodeColumn;
        private System.Windows.Forms.BindingSource orderedSource;
        private System.Windows.Forms.DataGridViewTextBoxColumn orderQty;
        private System.Windows.Forms.DataGridViewTextBoxColumn prodColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn bcodeColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn idDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn orderIdDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn productIdDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn priceDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn qtyOrderedDataGridViewTextBoxColumn1;
        private System.Windows.Forms.DataGridViewTextBoxColumn qtyReceivedDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn productDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn orderDataGridViewTextBoxColumn;
    }
}