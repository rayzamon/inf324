using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data.SqlClient;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WindowsFormsApplication2
{
    public partial class Form1 : Form
    {
        int Rm, Gm, Bm;
        int lim = 10;


        public Form1()
        {
            InitializeComponent();
        }


        private void button1_Click(object sender, EventArgs e)
        {
            openFileDialog1.FileName = string.Empty;
            openFileDialog1.Filter = "Archivos JPG|*.JPG|Archivos BMP|*.bmp";
            openFileDialog1.ShowDialog();
            if (openFileDialog1.FileName != string.Empty)
            {
                Bitmap bmp = new Bitmap(openFileDialog1.FileName);
                pictureBox1.Image = bmp;
            }
        }
        bool uno = false;
        bool dos = false;
        bool tres = false;
       

        private void pictureBox1_MouseClick(object sender, MouseEventArgs e)
        {

            SqlConnection con = new SqlConnection();
            SqlCommand cmd = new SqlCommand();
            con.ConnectionString = "server=(local);database=coloresbd_montanio;user=ray;pwd=123456";
            con.Open();

            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Color c = new Color();
            c = bmp.GetPixel(e.X, e.Y);
            Rm = c.R;
            Gm = c.G;
            Bm = c.B;
           
            textBox1.Text = c.R.ToString();
            textBox2.Text = c.G.ToString();
            textBox3.Text = c.B.ToString();

            if (((uno == false) && (dos == false))&&( tres == false))
            {
               
            dos = true; 
            tres = true;
            cmd.Connection = con;
            cmd.CommandText = "UPDATE coloresrgb SET rbd = " + textBox1.Text + ",gbd=" + textBox2.Text + ",bbd=" + textBox3.Text + " WHERE num = 1";
            cmd.ExecuteNonQuery();
            cmd.CommandText = "UPDATE coloresrgb SET rbd = 0,gbd=0,bbd=0 WHERE num = 2";
            cmd.ExecuteNonQuery();
            cmd.CommandText = "UPDATE coloresrgb SET rbd = 0,gbd=0,bbd=0 WHERE num = 3";
            cmd.ExecuteNonQuery();
            }
            else if (((dos == true) && (tres == true)) && (uno == false))
            {
                cmd.Connection = con;
                cmd.CommandText = "UPDATE coloresrgb SET rbd = " + textBox1.Text + ",gbd=" + textBox2.Text + ",bbd=" + textBox3.Text + " WHERE num = 2";
                cmd.ExecuteNonQuery();
                dos= false;
            }
            else if (((dos == false) && (uno == false)) && (tres == true))
            {
                cmd.Connection = con;
                cmd.CommandText = "UPDATE coloresrgb SET rbd = " + textBox1.Text + ",gbd=" + textBox2.Text + ",bbd=" + textBox3.Text + " WHERE num = 3";
                cmd.ExecuteNonQuery();
                tres = false;
            }

            // Actualizar el DataGridView después de la modificación
            SqlDataAdapter ada = new SqlDataAdapter();
            ada.SelectCommand = new SqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "select * from coloresrgb";
            DataSet ds = new DataSet();
            ada.Fill(ds);
            dataGridView1.DataSource = ds.Tables[0];

            con.Close();


           /* for (int i = e.X - ((int)lim / 2); i < e.X + ((int)lim / 2); i++)
                for (int j = e.Y - ((int)lim / 2); j < e.Y + ((int)lim / 2); j++)
                {
                    c = bmp.GetPixel(i, j);
                    Rc = Rc + c.R;
                    Gc = Gc + c.G;
                    Bc = Bc + c.B;
                }
            Rc = (int)Rc / (lim * lim);
            Gc = (int)Gc / (lim * lim);
            Bc = (int)Bc / (lim * lim);*/
            }

        private void button2_Click(object sender, EventArgs e)
        {
            SqlConnection con = new SqlConnection();
            SqlCommand cmd = new SqlCommand();
            con.ConnectionString = "server=(local);database=coloresbd_montanio;user=ray;pwd=123456";
            con.Open();

            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            cmd.Connection = con;
            
            int rt = 0, gt = 0, bt = 0;//este si
            int rValue = 0, gValue = 0, bValue = 0;

            cmd.CommandText = "SELECT CAST(rbd AS INT) FROM coloresrgb WHERE num = 1";
            rValue = (int)cmd.ExecuteScalar();

            cmd.CommandText = "SELECT CAST(gbd AS INT) FROM coloresrgb WHERE num = 1";
            gValue = (int)cmd.ExecuteScalar();

            cmd.CommandText = "SELECT CAST(bbd AS INT) FROM coloresrgb WHERE num = 1";
            bValue = (int)cmd.ExecuteScalar();
            //---------------------------------------------------------------------------
            //int rtt = 0, gtt = 0, btt = 0;
            int rValuet = 0, gValuet = 0, bValuet = 0;

            cmd.CommandText = "SELECT CAST(rbd AS INT) FROM coloresrgb WHERE num = 2";
            rValuet = (int)cmd.ExecuteScalar();

            cmd.CommandText = "SELECT CAST(gbd AS INT) FROM coloresrgb WHERE num = 2";
            gValuet = (int)cmd.ExecuteScalar();

            cmd.CommandText = "SELECT CAST(bbd AS INT) FROM coloresrgb WHERE num = 2";
            bValuet = (int)cmd.ExecuteScalar();
            //---------------------------------------------------------------------------
            //int rttc = 0, gttc = 0, bttc = 0;
            int rValuetc = 0, gValuetc = 0, bValuetc = 0;

            cmd.CommandText = "SELECT CAST(rbd AS INT) FROM coloresrgb WHERE num = 3";
            rValuetc = (int)cmd.ExecuteScalar();

            cmd.CommandText = "SELECT CAST(gbd AS INT) FROM coloresrgb WHERE num = 3";
            gValuetc = (int)cmd.ExecuteScalar();

            cmd.CommandText = "SELECT CAST(bbd AS INT) FROM coloresrgb WHERE num = 3";
            bValuetc = (int)cmd.ExecuteScalar();
            Random random = new Random();
            Color c = new Color();
            Color colorAleatorio1 = Color.FromArgb(random.Next(256), random.Next(256), random.Next(256));
            Color colorAleatorio2 = Color.FromArgb(random.Next(256), random.Next(256), random.Next(256));
            Color colorAleatorio3 = Color.FromArgb(random.Next(256), random.Next(256), random.Next(256));
            //primercolor
            for (int i = 0; i < bmp.Width - lim; i = i + lim)
                for (int j = 0; j < bmp.Height - lim; j = j + lim)
                {
                    for (int o = i; o < i + lim; o++)
                        for (int p = j; p < j + lim; p++)
                        {
                            c = bmp.GetPixel(o, p);
                            rt = rt + c.R;
                            gt = gt + c.G;
                            bt = bt + c.B;
                        }
                    rt = (int)rt / (lim * lim);
                    gt = (int)gt / (lim * lim);
                    bt = (int)bt / (lim * lim);

                    if (((rValue - 10 < rt) && (rt < rValue + 10)) //o aqui
                        && ((gValue - 10 < gt) && (gt < gValue + 10))
                        && ((bValue - 10 < bt) && (bt < bValue + 10)))
                    {
                        for (int o = i; o < i + lim; o++)
                            for (int p = j; p < j + lim; p++)
                            {
                                bmp2.SetPixel(o, p, colorAleatorio1);
                            }

                    }else if (((rValuet - 10 < rt) && (rt < rValuet + 10)) //o aqui
                     && ((gValuet - 10 < gt) && (gt < gValuet + 10))
                     && ((bValuet - 10 < bt) && (bt < bValuet + 10)))
                    {
                        for (int o = i; o < i + lim; o++)
                            for (int p = j; p < j + lim; p++)
                            {
                                bmp2.SetPixel(o, p, colorAleatorio2);
                            }

                    }else if (((rValuetc - 10 < rt) && (rt < rValuetc + 10)) //o aqui
                        && ((gValuetc - 10 < gt) && (gt < gValuetc + 10))
                        && ((bValuetc - 10 < bt) && (bt < bValuetc + 10)))
                    {
                        for (int o = i; o < i + lim; o++)
                            for (int p = j; p < j + lim; p++)
                            {
                                bmp2.SetPixel(o, p, colorAleatorio3);
                            }

                    }else
                    {
                        for (int o = i; o < i + lim; o++)
                            for (int p = j; p < j + lim; p++)
                            {
                                c = bmp.GetPixel(o, p);
                                bmp2.SetPixel(o, p, Color.FromArgb(c.R, c.G, c.B));
                            }

                    }

                }
            pictureBox1.Image = bmp2;
        }

    }
}
