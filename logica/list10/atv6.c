#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
#include <string.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    
    char str[100];
    int j;

    printf("Digite uma frase: ");
    fgets(str, sizeof(str), stdin);

    for(j = strlen(str); j >= 0;j--){
        printf("%c", str[j]);
    }

    return 0;
}