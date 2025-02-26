namespace HyperStoreApp.Forms.Controls
{
    partial class UcEmployeeMenu
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

        #region Component Designer generated code

        /// <summary> 
        /// Required method for Designer support - do not modify 
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.btnCompleteOrders = new System.Windows.Forms.Button();
            this.btnExit = new System.Windows.Forms.Button();
            this.btnHome = new System.Windows.Forms.Button();
            this.btnCompleteRequests = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // btnCompleteOrders
            // 
            this.btnCompleteOrders.FlatAppearance.BorderSize = 0;
            this.btnCompleteOrders.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnCompleteOrders.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnCompleteOrders.Location = new System.Drawing.Point(29, 178);
            this.btnCompleteOrders.Name = "btnCompleteOrders";
            this.btnCompleteOrders.Size = new System.Drawing.Size(107, 23);
            this.btnCompleteOrders.TabIndex = 20;
            this.btnCompleteOrders.Tag = "orders";
            this.btnCompleteOrders.Text = "Поръчки";
            this.btnCompleteOrders.TextAlign = System.Drawing.ContentAlignment.MiddleLeft;
            this.btnCompleteOrders.UseVisualStyleBackColor = true;
            // 
            // btnExit
            // 
            this.btnExit.FlatAppearance.BorderSize = 0;
            this.btnExit.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnExit.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnExit.Location = new System.Drawing.Point(29, 244);
            this.btnExit.Name = "btnExit";
            this.btnExit.Size = new System.Drawing.Size(107, 23);
            this.btnExit.TabIndex = 18;
            this.btnExit.Tag = "exit";
            this.btnExit.Text = "Изход";
            this.btnExit.TextAlign = System.Drawing.ContentAlignment.MiddleLeft;
            this.btnExit.UseVisualStyleBackColor = true;
            // 
            // btnHome
            // 
            this.btnHome.FlatAppearance.BorderSize = 0;
            this.btnHome.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnHome.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnHome.Location = new System.Drawing.Point(29, 145);
            this.btnHome.Name = "btnHome";
            this.btnHome.Size = new System.Drawing.Size(107, 23);
            this.btnHome.TabIndex = 21;
            this.btnHome.Tag = "home";
            this.btnHome.Text = "Начало";
            this.btnHome.TextAlign = System.Drawing.ContentAlignment.MiddleLeft;
            this.btnHome.UseVisualStyleBackColor = true;
            // 
            // btnCompleteRequests
            // 
            this.btnCompleteRequests.FlatAppearance.BorderSize = 0;
            this.btnCompleteRequests.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnCompleteRequests.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnCompleteRequests.Location = new System.Drawing.Point(29, 211);
            this.btnCompleteRequests.Name = "btnCompleteRequests";
            this.btnCompleteRequests.Size = new System.Drawing.Size(107, 23);
            this.btnCompleteRequests.TabIndex = 22;
            this.btnCompleteRequests.Tag = "orders";
            this.btnCompleteRequests.Text = "Заявки";
            this.btnCompleteRequests.TextAlign = System.Drawing.ContentAlignment.MiddleLeft;
            this.btnCompleteRequests.UseVisualStyleBackColor = true;
            // 
            // UcEmployeeMenu
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.Controls.Add(this.btnCompleteRequests);
            this.Controls.Add(this.btnHome);
            this.Controls.Add(this.btnCompleteOrders);
            this.Controls.Add(this.btnExit);
            this.Name = "UcEmployeeMenu";
            this.Size = new System.Drawing.Size(170, 510);
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.Button btnCompleteOrders;
        private System.Windows.Forms.Button btnExit;
        private System.Windows.Forms.Button btnHome;
        private System.Windows.Forms.Button btnCompleteRequests;
    }
}
