package com.example.group1_project1

import android.content.Intent
import android.os.Bundle
import android.util.Log
import androidx.appcompat.app.AppCompatActivity
import java.util.*
import kotlin.concurrent.timerTask

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        startSecondActivity()
    }

    fun startSecondActivity(){
        val intent = Intent (this,LoginActivity::class.java)

        val tmtask = timerTask {
            if(!isDestroyed){
                startActivity(intent)
                finish()
            }
        }

        val timer = Timer()
        timer.schedule(tmtask,2000)


    }
}