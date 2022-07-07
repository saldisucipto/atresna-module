import 'package:flutter/material.dart';

class LoginScreens extends StatelessWidget {
  const LoginScreens({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    void login() {
      print("Login");
    }

    var screenHight = MediaQuery.of(context).size.height;
    var screenWidth = MediaQuery.of(context).size.width;

    return Scaffold(
      body: Row(
        children: [
          Container(
            width: screenWidth * 0.5,
            height: screenHight,
            decoration: const BoxDecoration(),
            child: Center(
              child: SizedBox(
                width: screenWidth * 0.3,
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: const [
                    Image(
                      image: AssetImage("assets/logo.png"),
                    ),
                    Text(
                      "Atresna Power Soft - (APS)",
                      style:
                          TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
                    ),
                    Text(
                      "© Copyright Atresna Creative - 2022",
                      style: TextStyle(fontSize: 10),
                    )
                  ],
                ),
              ),
            ),
          ),
          SizedBox(
            width: screenWidth * 0.5,
            height: screenHight,
            child: Container(
              width: double.infinity,
              height: double.infinity,
              color: Colors.blue,
              padding: const EdgeInsets.all(30),
              child: Container(
                width: 800,
                height: 800,
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(20),
                  color: Colors.white,
                ),
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    const Icon(
                      Icons.person_outline_rounded,
                      color: Colors.blue,
                      size: 100,
                    ),
                    const Padding(
                      padding: EdgeInsets.only(bottom: 20),
                      child: Text(
                        "Login Account",
                        style: TextStyle(
                          color: Colors.blue,
                          fontSize: 26,
                          fontStyle: FontStyle.normal,
                        ),
                      ),
                    ),
                    const SizedBox(
                      width: 300,
                      child: TextField(
                        decoration: InputDecoration(hintText: "Username"),
                      ),
                    ),
                    const SizedBox(
                      width: 300,
                      child: TextField(
                        decoration: InputDecoration(hintText: "Password"),
                        obscureText: true,
                      ),
                    ),
                    GestureDetector(
                      onTap: () => login(),
                      child: SizedBox(
                        width: 300,
                        child: Center(
                          child: Container(
                            margin: const EdgeInsets.symmetric(vertical: 25),
                            width: 100,
                            height: 40,
                            decoration: BoxDecoration(
                              color: Colors.blue,
                              borderRadius: BorderRadius.circular(20),
                            ),
                            child: const Center(
                              child: Text(
                                "Login",
                                style: TextStyle(color: Colors.white),
                              ),
                            ),
                          ),
                        ),
                      ),
                    ),
                  ],
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }
}
