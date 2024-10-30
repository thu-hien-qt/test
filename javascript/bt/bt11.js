colors = ["white", "blue", "yellow"];
animal = ["dog", "cat", "bird"];

coloranimal = colors.concat(animal)

result = "";
for (i = 0; i < coloranimal.length; i++)
{
    if (i == 0) {
        result += coloranimal[i];
    } else {
    result += ", " + coloranimal[i]
    }
}
console.log(result);