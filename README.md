# **Tactics-Connect** <!-- omit in toc -->
> <sup>Short Description</sup>

- [**Introduction**](#introduction)
    - [**Core Members:**](#core-members)
    - [**Frontend Team:**](#frontend-team)
    - [**Backend Team:**](#backend-team)
- [**Directories**](#directories)
- [**Conventions**](#conventions)
- [**Dependencies**](#dependencies)
- [**Installation**](#installation)
- [**Usage**](#usage)

## **Introduction**
> @Brief: 
> - Tactics-Connect is an informational system web application that focuses on the TACTICS organization.

> Goal: To unite TACTICS, disseminate information, and

### **Project Lead**:
- Maricel Fornaleza

### **Core Members:**
- Martin Edgar Atole
- Marco Mosna

---

## **Conventions**
1. **Github**
    - Commits:
        ``` shell
        git commit -m [action]: [description]
        ```
        - Action:
            | Option | Information |
            | :---: | :--- |
            | `feat`        | New feature for the user, not a new feature for build script.         |
            | `fix`         | Bug fix for the user, not a fix to a build script.                    |
            | `docs`        | Changes to the documentation.                                         |
            | `style`       | Formatting, missing semi colons, etc; no production code change       |
            | `refactor`    | Refactoring production code, eg. renaming a variable                  |
            | `test`        | Adding missing tests, refactoring tests; no production code change    |
            | `chore`       | Updating grunt tasks etc; no production code change.                  |
            
    - Branching:
        ``` shell
            git branch '[layer]/[description]' '[commit-hash]'
            --- or ---
            git checkout -b '[layer]/[description]' '[commit-hash]'
        ```
        - Layer:
            - `frontend` - A branch that concerns the frontend (**presentation layer**) of the project.
            - `backend` - A branch that concerns the backend (**data access layer**) of the project.
        - Description:
            - Options: `feature`, `description`, or `bugfix`.
        - Commit Hash (Optional):
            - Create a branch of `[layer]/[description]` from a previous commit using the `[commit-hash]`.
---

## **Directories**
- `WordInvaders`
    - Information
        | Name | Description | Subdirectories |
        | ---: | :--- | :--- |
        | `\Assets`           | Contains the images, sprites, videos, or any assets used in the development phase.            | | [`\Assets`, `Scenes`, `Scripts`]
        | `\Builds`         | Contains the built and executive file of the game.         | |
        
---


## **Dependencies**
1. **WordInvaders**
    -
        
    
---

## **Installation**
1. **Install Git**
2. **Install any IDE**
3. **Install Nodejs**
4. **Install Laragon**

---

## **Usage**

---
