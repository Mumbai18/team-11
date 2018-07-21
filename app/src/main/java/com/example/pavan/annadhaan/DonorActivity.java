package com.example.pavan.annadhaan;

import android.content.Intent;
import android.graphics.Bitmap;
import android.provider.MediaStore;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;

import java.io.ByteArrayOutputStream;

public class DonorActivity extends AppCompatActivity {

     EditText quantity,package1;
    Button ready;
    EditText location,time;
    ImageView ivUpload;
    Bitmap bm;
    // private EditText;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_donor);

        quantity=(EditText)findViewById(R.id.et_quantity);
        package1=(EditText)findViewById(R.id.et_package);

        location=(EditText)findViewById(R.id.et_location);
        time=(EditText)findViewById(R.id.et_time);

        ivUpload=(ImageView)findViewById(R.id.ivUpload);



        ivUpload.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i=new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
                startActivityForResult(i,100);
            }
        });








    }//oncreate ends

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if(resultCode==RESULT_OK && requestCode==100)
        {
            bm=(Bitmap)data.getExtras().get("data");
            ivUpload.setImageBitmap(bm);
            ByteArrayOutputStream baos=new ByteArrayOutputStream();

            bm.compress(Bitmap.CompressFormat.JPEG,100,baos);
            byte[] data1=baos.toByteArray();
        }
    }
}
