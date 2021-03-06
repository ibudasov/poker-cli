# 🃏 Poker CLI

Command line application which demonstrates how awesome `ibudasov/poker` library is.

# 🤙 Design

The application is designed in hexagonal style, making separation between Domain, Application and Infrastructure layers. 
Domain layer is not present in the codebase, because it naturally belongs to the mentioned `ibudasov/poker` library. 

# ⚙️ Install

 `composer install` — installs the app 

# 💻 Usage

 `composer run example` — runs example, based on `/exampleInputFile.txt`
 
 `php index.php --inputFile /path/to/file/input.txt` — this is how possible to specify custom `input.txt`
 
# 🚧 Todo

- something like Gradle might be used for making commands nicer and user-friendly, with less parameters
- to make input and output nicer than bare PHP. Symfony library might help
- tests of the application are completely missing, but this problem is compensated in the library, which is completely covered by tests 
