package com.example.pavan.annadhaan;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.Button;
import android.widget.EditText;

public class DonorActivity extends AppCompatActivity {

     EditText quantity,package1;
    Button ready;
    EditText location,time;
    // private EditText;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_donor);

        quantity=(EditText)findViewById(R.id.et_quantity);
        package1=(EditText)findViewById(R.id.et_package);

        location=(EditText)findViewById(R.id.et_location);
        time=(EditText)findViewById(R.id.et_time);


    }
}
