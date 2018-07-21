package com.example.chandrashekhar.myapplication;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {
    Editext etUname,etPassword;
    TextView tvLogin,tvNewuser;
    Button btnSubmit;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        etUname=(EditText)findViewById(R.id.etUname);
        tvNewuser=(EditText)findViewById(R.id.tvNewuser);
        etPassword=(EditText)findViewById(R.id.etPassword);
        tvLogin=(TextView)findViewById(R.id.tvLogin);
        btnSubmit=(Button)findViewById(R.id.btnSubmit);

        btnSubmit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(MainActivity.this,xyz.class );
                startActivity(i);
            }
        }


        );
        tvNewuser.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent j = new Intent(MainActivity.this,abc.class );
                startActivity(j);
            }
        });

    }
}
