import * as React from 'react'
import { ClassesContext } from '@/contexts/ClassesContext'

interface ClassesProviderProps {
  children: React.ReactNode
}

const initialValue: IClass[] = [...Array(8)].map((_, index) => ({
  id: index,
  name: 'Turma ' + ++index,
  shift: 'MORNING',
  academicYear: '2025.1',
  createdAt: new Date(),
  updatedAt: new Date(),
  accountId: 1,
  schoolId: 1,
}))

export default function ClassesProvider({ children }: ClassesProviderProps) {
  const [classes, setClasses] = React.useState<IClass[]>(initialValue)
  const [currentClass, setCurrentClass] = React.useState<IClass | null>(null)
  const [openCreateDialog, setOpenCreateDialog] = React.useState<boolean>(false)
  const [openUpdateDialog, setOpenUpdateDialog] = React.useState<boolean>(false)

  const handleToggleCreateDialog = () => {
    setOpenCreateDialog(!openCreateDialog)
  }

  const handleToggleUpdateDialog = () => {
    setOpenUpdateDialog(!openUpdateDialog)
  }

  const handleCreateClass = (cls: ICreateClassData) => {
    const newClass: IClass = {
      id: classes.length + 1,
      createdAt: new Date(),
      updatedAt: new Date(),
      accountId: 1,
      schoolId: 1,
      ...cls,
    }

    setClasses([...classes, newClass])
  }

  const handleUpdateClass = (id: number, updatedData: IUpdateClassData) => {
    setClasses((prevClasses) =>
      prevClasses.map((cls) =>
        cls.id === id ? { ...cls, ...updatedData, updatedAt: new Date() } : cls
      )
    )
  }

  const handleDeleteClass = (id: number) => {
    setClasses((prevClasses) => prevClasses.filter((cls) => cls.id !== id))
  }

  const handleFindClass = (id: number) => {
    return classes.find((cls) => cls.id === id) || null
  }

  return (
    <ClassesContext.Provider
      value={{
        classes,
        currentClass,
        setCurrentClass,
        openCreateDialog,
        openUpdateDialog,
        handleToggleCreateDialog,
        handleToggleUpdateDialog,
        handleCreateClass,
        handleUpdateClass,
        handleDeleteClass,
        handleFindClass,
      }}
    >
      {children}
    </ClassesContext.Provider>
  )
}
