#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
int main() {
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");

    int n, ite, i, mult = 0;

    printf("Deseja saber a tabuada de qual número?");
    scanf("%d", &n);

    printf("A tabuada terá quantas iterações?");
    scanf("%d", &ite);

    for(i = 1; i <= ite; i++) {
        mult = i * n;
        printf("%d x %d = %d\n", i, n, mult);
    }
    
    return 0;
}