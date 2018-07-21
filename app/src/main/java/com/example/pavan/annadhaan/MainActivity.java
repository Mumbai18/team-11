package com.example.pavan.annadhaan;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    EditText etFN,etLN,etMail,etPhone,etPassword,etAddress;
    Button btnSubmit;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        etFN=(EditText)findViewById(R.id.etFN);
        etLN=(EditText)findViewById(R.id.etLN);
        etMail=(EditText)findViewById(R.id.etMail);
        etPhone=(EditText)findViewById(R.id.etPhone);
        etPassword=(EditText)findViewById(R.id.etPassword);
        etAddress=(EditText)findViewById(R.id.etAddress);

        btnSubmit=(Button)findViewById(R.id.btnSubmit);

        btnSubmit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String FN=etFN.getText().toString();
                String LN=etLN.getText().toString();
                String Mail=etMail.getText().toString();
                String Phone=etPhone.getText().toString();
                String Password=etPassword.getText().toString();
                String Address=etAddress.getText().toString();



            }
        });
    }
}
